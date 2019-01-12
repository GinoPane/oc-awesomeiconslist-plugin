<?php

namespace GinoPane\AwesomeIconsList\FormWidgets;

use Backend\Classes\FormWidgetBase;

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
     * @inheritDoc
     */
    protected $defaultAlias = self::DEFAULT_ALIAS;

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->fillFromConfig([
            'unicodeValue'
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
    }

    public function loadAssets()
    {
        $this->addCss("https://use.fontawesome.com/releases/v5.6.3/css/all.css");
        $this->addCss("css/awesomeiconslist.css");
        $this->addJs("js/awesomeiconslist.js");
    }
}
