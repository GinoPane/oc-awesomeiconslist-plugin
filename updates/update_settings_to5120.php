<?php

namespace GinoPane\AwesomeIconsList\Updates;

use DB;
use Schema;
use October\Rain\Database\Updates\Migration;

/**
 * Class UpdateSettingsTo5120
 *
 * @package GinoPane\AwesomeIconsList\Updates
 */
class UpdateSettingsTo5120 extends UpdateSettingsAbstract
{
    protected static $PREVIOUS_FONTAWESOME_LINK = 'https://use.fontawesome.com/releases/v5.9.0/css/all.css';
    protected static $PREVIOUS_FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];

    protected static $NEW_FONTAWESOME_LINK = 'https://use.fontawesome.com/releases/v5.12.0/css/all.css';
    protected static $NEW_FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];
}
