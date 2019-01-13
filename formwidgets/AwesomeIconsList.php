<?php

namespace GinoPane\AwesomeIconsList\FormWidgets;

use Backend\Classes\FormWidgetBase;
use GinoPane\AwesomeIconsList\Models\Settings;

/**
 * Awesome Icons List Form Widget
 */
class AwesomeIconsList extends FormWidgetBase
{
    const DEFAULT_ALIAS = 'awesomeiconslist';

    /**
     * @var bool Return unicode value for web font instead of valid CSS class
     */
    public $unicodeValue = false;

    /**
     * @var string Placeholder when no icon is selected
     */
    public $placeholder = '';

    /**
     * @var string Add empty option to the option list
     */
    public $emptyOption = false;

    /**
     * @inheritDoc
     */
    protected $defaultAlias = self::DEFAULT_ALIAS;

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->fillFromConfig([
            'unicodeValue',
            'placeholder',
            'emptyOption'
        ]);
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();

        return $this->makePartial('awesomeiconslist');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['field'] = $this->formField;
        $this->vars['unicodeValue'] = $this->unicodeValue;
        $this->vars['placeholder'] = $this->placeholder;
        $this->vars['emptyOption'] = $this->emptyOption;

        $this->vars['value'] = $this->getLoadValue();
    }

    public function loadAssets()
    {
        /** @var Settings $settings */
        $settings = Settings::instance();

        $this->addCss(
            $settings->fontAwesomeLink(),
            $settings->fontAwesomeLinkAttributes()
        );

        $this->addCss("css/awesomeiconslist.css");
    }

}
