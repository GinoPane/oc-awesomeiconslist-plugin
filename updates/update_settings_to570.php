<?php

namespace GinoPane\AwesomeIconsList\Updates;

use DB;
use Schema;
use October\Rain\Database\Updates\Migration;

/**
 * Class UpdateSettingsTo570
 *
 * @package GinoPane\AwesomeIconsList\Updates
 */
class UpdateSettingsTo570 extends UpdateSettingsAbstract
{
    protected static $PREVIOUS_FONTAWESOME_LINK = 'https://use.fontawesome.com/releases/v5.6.3/css/all.css';
    protected static $PREVIOUS_FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'integrity',
            'value'     => 'sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/'
        ],
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];

    protected static $NEW_FONTAWESOME_LINK = 'https://use.fontawesome.com/releases/v5.7.0/css/all.css';
    protected static $NEW_FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'integrity',
            'value'     => 'sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ'
        ],
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];
}
