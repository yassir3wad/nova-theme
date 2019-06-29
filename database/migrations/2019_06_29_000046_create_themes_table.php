<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("code")->unique();
            $table->boolean("default")->nullable()->default(false);
            $table->softDeletes();
            $table->timestamps();
        });

        $data = [
            0 => [
                "name" => "Tighten",
                "code" => "k6oK6g"
            ],
            1 => [
                "name" => "Miami Ice",
                "code" => "3yxWQW"
            ],
            2 => [
                "name" => "Blutopian",
                "code" => "mv74QE"
            ],
            3 => [
                "name" => "Ocean",
                "code" => "n6G0vz"
            ],
            4 => [
                "name" => "Dusk",
                "code" => "R6qLyY"
            ],
            5 => [
                "name" => "Clean Green",
                "code" => "KyLbve"
            ],
            6 => [
                "name" => "Flat Blue",
                "code" => "nQ8j6q"
            ],
            7 => [
                "name" => "Test",
                "code" => "763K6P"
            ],
            8 => [
                "name" => "Earth",
                "code" => "760E1v"
            ],
            9 => [
                "name" => "netdeyim",
                "code" => "4QR86J"
            ],
            10 => [
                "name" => "Flat Red",
                "code" => "rQJVQW",
            ],
            11 => [
                "name" => "Template",
                "code" => "4Ql40Q",
            ],
            12 => [
                "name" => "Heart Cup Nova Theme",
                "code" => "b6b5My"
            ],
            13 => [
                "name" => "wrges",
                "code" => "pv2py9"
            ],
            14 => [
                "name" => "cp",
                "code" => "4Ql0Qa"
            ],
            15 => [
                "name" => "Subtle Blue",
                "code" => "k6oWq6"
            ],
            16 => [
                "name" => "Smart Agro",
                "code" => "wywoKy"
            ],
            17 => [
                "name" => "first nova theme",
                "code" => "kymK5v"
            ],
            18 => [
                "name" => "Mobi Theme",
                "code" => "4QRDr6"
            ],
            19 => [
                "name" => "Emerald Green",
                "code" => "76gaMQ"
            ],
            20 => [
                "name" => "Dashboard",
                "code" => "76gmEQ"
            ],
            21 => [
                "name" => "Green",
                "code" => "M6aKnQ"
            ],
            22 => [
                "name" => "glacier",
                "code" => "aQKxgy"
            ],
            23 => [
                "name" => "Wood",
                "code" => "n6Gkj6"
            ],
            24 => [
                "name" => "orckid",
                "code" => "b6bKlv",
            ],
            25 => [
                "name" => "NovaPurple",
                "code" => "nQ8eAy"
            ],
            26 => [
                "name" => "Wayne State University Nova Theme",
                "code" => "8vWbl6"
            ],
            27 => [
                "name" => "Glacier",
                "code" => "Y6rZ26"
            ],
            28 => [
                "name" => "nrctheme",
                "code" => "4QlLEQ"
            ],
            29 => [
                "name" => "Earth",
                "code" => "b6b31v"
            ],
            30 => [
                "name" => "light-purple",
                "code" => "b6Ap1y"
            ],
            31 => [
                "name" => "brandsilo",
                "code" => "nQ9706"
            ],
            32 => [
                "name" => "Astro",
                "code" => "zQZJzQ"
            ],
            33 => [
                "name" => "Earth",
                "code" => "qvn9K6"
            ],
            34 => [
                "name" => "We Fix It",
                "code" => "4Ql8bQ"
            ],
            35 => [
                "name" => "URSURE",
                "code" => "b61wbQ"
            ],
            36 => [
                "name" => "gedinfo",
                "code" => "nQ8bY6"
            ],
            37 => [
                "name" => "Heart Cup Nova Theme",
                "code" => "R6OadQ"
            ],
            38 => [
                "name" => "Ocean Mod",
                "code" => "3yxnpv"
            ],
            39 => [
                "name" => "Aero",
                "code" => "96BNL6"
            ],
            40 => [
                "name" => "Opushero - Gradients",
                "code" => "rQJ8W6"
            ],
            41 => [
                "name" => "trackinovatheme",
                "code" => "KyLZXv"
            ],
            42 => [
                "name" => "MyTheme",
                "code" => "1QYz9y"
            ],
            43 => [
                "name" => "Darks Lord",
                "code" => "b6AD4y"
            ],
            44 => [
                "name" => "Nova Green Theme",
                "code" => "aQK7WQ"
            ],
            45 => [
                "name" => "tristup",
                "code" => "b6b8aQ"
            ],
            46 => [
                "name" => "Nova Theme Green",
                "code" => "760AOv"
            ],
            47 => [
                "name" => "Astro",
                "code" => "b6AN1v"
            ],
            48 => [
                "name" => "SnowBlind",
                "code" => "zQZj1Q"
            ],
            49 => [
                "name" => "Department of Tourism",
                "code" => "8vWqqy"
            ],
            50 => [
                "name" => "q",
                "code" => "4QReXv"
            ],
            51 => [
                "name" => "toolbox",
                "code" => "8vWOMv"
            ],
            52 => [
                "name" => "woopraish",
                "code" => "pv287y"
            ],
            53 => [
                "name" => "BTV Admin",
                "code" => "nQ8aAy"
            ],
            54 => [
                "name" => "test",
                "code" => "b6Vozv"
            ],
            55 => [
                "name" => "rec",
                "code" => "k6oAAQ"
            ],
            56 => [
                "name" => "mc",
                "code" => "16k7K6"
            ],
            57 => [
                "name" => "PupLinx",
                "code" => "wywl86"
            ],
            58 => [
                "name" => "cool",
                "code" => "M6awWQ"
            ],
            59 => [
                "name" => "gffgf",
                "code" => "EQMjKy"
            ],
            60 => [
                "name" => "ents",
                "code" => "763z0y"
            ],
            61 => [
                "name" => "test123",
                "code" => "zQZE8v"
            ],
            62 => [
                "name" => "Bootstrap 4",
                "code" => "7QNJdQ"
            ],
            63 => [
                "name" => "teste-theme",
                "code" => "b61Lwy"
            ]
        ];
        foreach (array_reverse($data) as $datum) {
            \Yassir3wad\NovaTheme\Models\Theme::create($datum);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
