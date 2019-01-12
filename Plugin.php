<?php

namespace GinoPane\AwesomeIconsList;

use GinoPane\AwesomeIconsList\FormWidgets\AwesomeIconsList;
use System\Classes\PluginBase;

/**
 * Class Plugin
 *
 * @package GinoPane\AwesomeIconsList
 */
class Plugin extends PluginBase
{
    const DEFAULT_ICON = 'icon-magic';

    const LOCALIZATION_KEY = 'ginopane.awesomeiconslist::lang.';

    /**
     * Returns information about this plugin
     *
     * @return  array
     */
    public function pluginDetails()
    {
        return [
            'name'        => self::LOCALIZATION_KEY . 'plugin.name',
            'description' => self::LOCALIZATION_KEY . 'plugin.description',
            'author'      => 'Siarhei <Gino Pane> Karavai',
            'icon'        => self::DEFAULT_ICON,
            'homepage'    => 'https://github.com/ginopane/oc-awesomeiconslist-plugin'
        ];
    }

    /**
     * Boot method, called right before the request route
     */
    public function boot()
    {

    }

    public function registerFormWidgets()
    {
        return [
            AwesomeIconsList::class => AwesomeIconsList::DEFAULT_ALIAS
        ];
    }
}
