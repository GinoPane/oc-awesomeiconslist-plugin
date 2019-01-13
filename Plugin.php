<?php

namespace GinoPane\AwesomeIconsList;

use GinoPane\AwesomeIconsList\Components\FontAwesomeCssLink;
use GinoPane\AwesomeIconsList\FormWidgets\AwesomeIconsList;
use GinoPane\AwesomeIconsList\Models\Settings;
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
    public function pluginDetails(): array
    {
        return [
            'name'        => self::LOCALIZATION_KEY . 'plugin.name',
            'description' => self::LOCALIZATION_KEY . 'plugin.description',
            'author'      => 'Siarhei <Gino Pane> Karavai',
            'icon'        => self::DEFAULT_ICON,
            'homepage'    => 'https://github.com/ginopane/oc-awesomeiconslist-plugin'
        ];
    }

    public function registerFormWidgets(): array
    {
        return [
            AwesomeIconsList::class => AwesomeIconsList::DEFAULT_ALIAS
        ];
    }

    /**
     * Register components
     *
     * @return  array
     */
    public function registerComponents(): array
    {
        return [
            FontAwesomeCssLink::class => FontAwesomeCssLink::NAME,
        ];
    }

    /**
     * Register plugin settings
     *
     * @return array
     */
    public function registerSettings(): array
    {
        return [
            'settings' => [
                'label'       => self::LOCALIZATION_KEY . 'settings.name',
                'description' => self::LOCALIZATION_KEY . 'settings.description',
                'icon'        => self::DEFAULT_ICON,
                'class'       => Settings::class,
                'order'       => 100
            ]
        ];
    }
}
