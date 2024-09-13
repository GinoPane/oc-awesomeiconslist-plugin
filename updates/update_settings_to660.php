<?php

namespace GinoPane\AwesomeIconsList\Updates;

use DB;
use Schema;
use October\Rain\Database\Updates\Migration;

/**
 * Class UpdateSettingsTo590
 *
 * @package GinoPane\AwesomeIconsList\Updates
 */
class UpdateSettingsTo660 extends UpdateSettingsAbstract
{
    protected static $PREVIOUS_FONTAWESOME_LINK = 'https://use.fontawesome.com/releases/v5.12.0/css/all.css';
    protected static $PREVIOUS_FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'integrity',
            'value'     => 'sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay'
        ],
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];

    protected static $NEW_FONTAWESOME_LINK = 'https://use.fontawesome.com/releases/v6.6.0/css/all.css';
    protected static $NEW_FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];
}
