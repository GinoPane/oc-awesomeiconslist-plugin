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

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        if ($this->mode === static::MODE_RELATION) {
            return $this->hydrateRelationSaveValue($value);
        }

        if (is_array($value) && $this->mode === static::MODE_STRING) {
            return implode($this->getSeparatorCharacter(), $value);
        }

        return $value;
    }

    /**
     * Returns an array suitable for saving against a relation (array of keys).
     * This method also creates non-existent tags.
     * @return array
     */
    protected function hydrateRelationSaveValue($names)
    {
        if (!$names) {
            return $names;
        }

        $relationModel = $this->getRelationModel();
        $existingTags = $relationModel
            ->whereIn($this->nameFrom, $names)
            ->lists($this->nameFrom, $relationModel->getKeyName())
        ;

        $newTags = $this->customTags ? array_diff($names, $existingTags) : [];

        foreach ($newTags as $newTag) {
            $newModel = $relationModel::create([$this->nameFrom => $newTag]);
            $existingTags[$newModel->getKey()] = $newTag;
        }

        return array_keys($existingTags);
    }

    /**
     * @inheritDoc
     */
    public function getLoadValue()
    {
        $value = parent::getLoadValue();

        if ($this->mode === static::MODE_RELATION) {
            return $this->getRelationObject()->lists($this->nameFrom);
        }

        return $this->mode === static::MODE_STRING
            ? explode($this->getSeparatorCharacter(), $value)
            : $value;
    }

    /**
     * Returns defined field options, or from the relation if available.
     * @return array
     */
    public function getFieldOptions()
    {
        $options = $this->formField->options();

        if (!$options && $this->mode === static::MODE_RELATION) {
            $options = $this->getRelationModel()->lists($this->nameFrom);
        }

        return $options;
    }

    /**
     * Returns character(s) to use for separating keywords.
     * @return mixed
     */
    protected function getCustomSeparators()
    {
        if (!$this->customTags) {
            return false;
        }

        $separators = [];

        $separators[] = $this->getSeparatorCharacter();

        return implode('|', $separators);
    }

    /**
     * Convert the character word to the singular character.
     * @return string
     */
    protected function getSeparatorCharacter()
    {
        switch (strtolower($this->separator)) {
            case 'comma': return ',';
            case 'space': return ' ';
        }
    }

    public function loadAssets()
    {
        $this->addCss("https://use.fontawesome.com/releases/v5.6.3/css/all.css");
    }

}
