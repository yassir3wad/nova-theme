<?php

namespace Yassir3wad\NovaTheme\Resources;

use Yassir3wad\NovaTheme\Resources\Actions\SetDefaultThemeAction;
use Inspheric\Fields\Url;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use App\Nova\Resource;
use Timothyasp\Badge\Badge;

class Theme extends Resource
{
    public static $displayInNavigation = false;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Yassir3wad\NovaTheme\Models\Theme::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'code',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable(),

            Text::make('Code')
                ->sortable(),

            Boolean::make('Default')
                ->sortable(),

            Url::make('Preview', function () {
                return "https://novathemes.beyondco.de/themes/" . $this->model()->code;
            })->alwaysClickable()->label("Preview")
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new SetDefaultThemeAction)
                ->canRun(function () {
                    return true;
                })
        ];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public static function authorizeToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return false;
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
