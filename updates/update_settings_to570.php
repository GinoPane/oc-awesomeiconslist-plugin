<?php

namespace GinoPane\AwesomeIconsList\Updates;

use DB;
use Schema;
use October\Rain\Database\Updates\Migration;
use GinoPane\AwesomeIconsList\Models\Settings;

/**
 * Class UpdateSettingsTo570
 *
 * @package GinoPane\AwesomeIconsList\Updates
 */
class UpdateSettingsTo570 extends Migration
{
    const PREVIOUS_FONTAWESOME_LINK = "https://use.fontawesome.com/releases/v5.6.3/css/all.css";
    const PREVIOUS_FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'integrity',
            'value'     => 'sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/'
        ],
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];

    const NEW_FONTAWESOME_LINK = 'https://use.fontawesome.com/releases/v5.7.0/css/all.css';
    const NEW_FONTAWESOME_LINK_ATTRIBUTES = [
        [
            'attribute' => 'integrity',
            'value'     => 'sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ'
        ],
        [
            'attribute' => 'crossorigin',
            'value'     => 'anonymous'
        ]
    ];

    /**
     * Execute migrations
     */
    public function up()
    {
        $this->updateOrInsertSettings(self::NEW_FONTAWESOME_LINK, self::NEW_FONTAWESOME_LINK_ATTRIBUTES);
    }

    /**
     * Rollback migrations
     */
    public function down()
    {
        $this->updateOrInsertSettings(self::PREVIOUS_FONTAWESOME_LINK, self::PREVIOUS_FONTAWESOME_LINK_ATTRIBUTES);
    }

    /**
     * @param string $link
     * @param array  $attributes
     */
    private function updateOrInsertSettings(string $link, array $attributes)
    {
        if (Schema::hasTable('system_settings')) {
            $currentSettings = DB::table('system_settings')->whereItem(Settings::SETTINGS_CODE)->pluck('value')->first();

            $settings = [];

            $settings[Settings::FONTAWESOME_LINK_KEY ] = $link;
            $settings[Settings::FONTAWESOME_LINK_ATTRIBUTES_KEY] = $attributes;

            if ($currentSettings !== null) {
                DB::table('system_settings')->whereItem(Settings::SETTINGS_CODE)->update(
                    ['value' => json_encode($settings)]
                );
            } else {
                DB::table('system_settings')->insert(
                    ['item' => Settings::SETTINGS_CODE, 'value' => json_encode($settings)]
                );
            }
        }
    }
}