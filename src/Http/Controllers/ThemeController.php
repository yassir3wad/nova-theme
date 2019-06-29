<?php

namespace Yassir3wad\NovaTheme\Http\Controllers;

use Yassir3wad\NovaTheme\Models\Theme;
use Illuminate\Support\Facades\File;

class ThemeController
{
    public function sync()
    {
        $this->fetchData();

        return response(["message" => "Fetched Successfully"]);
    }

    private function fetchData()
    {
        $result = $this->getThemes();

        $codes = Theme::withTrashed()->pluck("code")->toArray();

        foreach ($result["resources"] as $resource) {
            $code = $resource["id"]["value"];
            $name = $resource["fields"][0]['value'];

            if (in_array($code, $codes))
                continue;

            File::makeDirectory(public_path("vendor/themes/$code"));

            $this->downloadUrlToFile("https://novathemes.beyondco.de/themes/$code.zip",
                public_path("vendor/themes/$code/file.zip"));

            $this->unzip($code);

            File::move(public_path("vendor/themes/$code/css/theme.css"), public_path("vendor/themes/$code.css"));
            File::deleteDirectory(public_path("vendor/themes/$code"));
            Theme::create(['name' => $name, "code" => $code]);
        }
    }

    private function getThemes()
    {
        $client = new \GuzzleHttp\Client();
        $result = $client->get("https://novathemes.beyondco.de/nova-api/themes?orderBy=views&orderByDirection=desc&perPage=1000");
        $result = (string)$result->getBody();
        return json_decode($result, true);
    }

    private function downloadUrlToFile($url, $outFileName)
    {
        if (is_file($url)) {
            copy($url, $outFileName);
        } else {
            $options = array(
                CURLOPT_FILE => fopen($outFileName, 'w'),
                CURLOPT_TIMEOUT => 28800,
                CURLOPT_URL => $url
            );

            $ch = curl_init();
            curl_setopt_array($ch, $options);
            curl_exec($ch);
            curl_close($ch);
        }
    }

    private function unzip($code)
    {
        $zip = new \ZipArchive;
        $zip->open(public_path("vendor/themes/$code/file.zip"));
        $zip->extractTo(public_path("vendor/themes/$code"));
        $zip->close();
    }
}
