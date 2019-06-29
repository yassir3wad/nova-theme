<?php

namespace Digitalcloud\NovaTheme\Resources\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Nova\Fields\Boolean;
use Digitalcloud\NovaTheme\Models\Theme;

class SetDefaultThemeAction extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $name = "Set Default";

    /**
     * Perform the action on the given models.
     *
     * @param \Laravel\Nova\Fields\ActionFields $fields
     * @param \Illuminate\Support\Collection $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        if (!$fields->get("default")) {
            $beforeTheme = Theme::getDefaultTheme();
            $models->each(function (Theme $theme) {
                $theme->update(["default" => false]);
            });
            if ($beforeTheme && $models->firstWhere("id", $beforeTheme->id)) {
                return self::redirect($this->getRedirectedUrl());
            }
        } else {
            $model = $models->first();
            Theme::where("id", "!=", $model->id)->update(["default" => false]);
            $model->update(["default" => true]);
            return self::redirect($this->getRedirectedUrl());
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Boolean::make("Is Default", "default")->rules("required", "boolean")
        ];
    }

    private function getRedirectedUrl()
    {
        $novaPath = rtrim(config("nova.path"), "/");
        return rtrim(config("nova.url"), "/") . ($novaPath ? "/$novaPath" : "") . "/nova-theme";
    }
}
