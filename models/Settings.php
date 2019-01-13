<?php

namespace GinoPane\AwesomeIconsList\Models;

use Model;
use System\Behaviors\SettingsModel;

/**
 * Class Settings
 *
 * @package GinoPane\AwesomeIconsList\Models
 */
class Settings extends Model {

    const FONTAWESOME_LINK = "https://use.fontawesome.com/releases/v5.6.3/css/all.css";

    const FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'integrity',
            'value'     => 'sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/'
        ],
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];

    const FONTAWESOME_LINK_KEY = 'fontawesome_link';
    const FONTAWESOME_LINK_ATTRIBUTES_KEY = 'fontawesome_link_attributes';

    const SETTINGS_CODE = 'ginopane_awesomeiconslist';

    public $implement = [SettingsModel::class];

    public $settingsCode = self::SETTINGS_CODE;

    public $settingsFields = 'fields.yaml';

    /**
     * @return string
     */
    public function fontAwesomeLink() : string
    {
        $link = !empty($this->{self::FONTAWESOME_LINK_KEY})
            ? (string) $this->{self::FONTAWESOME_LINK_KEY}
            : self::FONTAWESOME_LINK;

        return $link;
    }

    /**
     * @return array
     */
    public function fontAwesomeLinkAttributes(): array
    {
        $rawAttributes = !empty($this->{self::FONTAWESOME_LINK_ATTRIBUTES_KEY})
            ? (array) $this->{self::FONTAWESOME_LINK_ATTRIBUTES_KEY}
            : self::FONTAWESOME_LINK_ATTRIBUTES;

        $attributes = [];

        foreach ($rawAttributes as $attribute) {
            $attributes[$attribute['attribute']] = $attribute['value'];
        }

        return $attributes;
    }
} 