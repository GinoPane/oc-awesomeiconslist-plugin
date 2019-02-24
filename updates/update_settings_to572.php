<?php

namespace GinoPane\AwesomeIconsList\Updates;

use DB;
use Schema;
use October\Rain\Database\Updates\Migration;

/**
 * Class UpdateSettingsTo572
 *
 * @package GinoPane\AwesomeIconsList\Updates
 */
class UpdateSettingsTo572 extends UpdateSettingsAbstract
{
    protected static $PREVIOUS_FONTAWESOME_LINK = 'https://use.fontawesome.com/releases/v5.7.0/css/all.css';
    protected static $PREVIOUS_FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'integrity',
            'value'     => 'sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ'
        ],
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];

    protected static $NEW_FONTAWESOME_LINK = 'https://use.fontawesome.com/releases/v5.7.2/css/all.css';
    protected static $NEW_FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'integrity',
            'value'     => 'sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr'
        ],
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];
}
