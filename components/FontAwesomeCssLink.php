<?php

namespace GinoPane\AwesomeIconsList\Components;

use Cms\Classes\ComponentBase;
use GinoPane\AwesomeIconsList\Plugin;
use GinoPane\AwesomeIconsList\Models\Settings;


/**
 * Class FontAwesomeCssLink
 *
 * @package GinoPane\AwesomeIconsList\Components
 */
class FontAwesomeCssLink extends ComponentBase
{
    const NAME = 'fontAwesomeCssLink';

    /**
     * Returns information about this component, including name and description
     */
    public function componentDetails(): array
    {
        return [
            'name'        => Plugin::LOCALIZATION_KEY . 'components.fontawesomecsslink.name',
            'description' => Plugin::LOCALIZATION_KEY . 'components.fontawesomecsslink.description'
        ];
    }

    /**
     * Query the tag and posts belonging to it
     */
    public function onRun()
    {
        /** @var Settings $settings */
        $settings = Settings::instance();

        $this->addCss(
            $settings->fontAwesomeLink(),
            $settings->fontAwesomeLinkAttributes()
        );
    }
}
