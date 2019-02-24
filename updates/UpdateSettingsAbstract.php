<?php

namespace GinoPane\AwesomeIconsList\Updates;

use DB;
use Schema;
use October\Rain\Database\Updates\Migration;
use GinoPane\AwesomeIconsList\Models\Settings;

/**
 * Class UpdateSettingsAbstract
 *
 * @package GinoPane\AwesomeIconsList\Updates
 */
abstract class UpdateSettingsAbstract extends Migration
{
    protected static $PREVIOUS_FONTAWESOME_LINK = '';
    protected static $PREVIOUS_FONTAWESOME_LINK_ATTRIBUTES = [];

    protected static $NEW_FONTAWESOME_LINK = '';
    protected static $NEW_FONTAWESOME_LINK_ATTRIBUTES = [];

    /**
     * Execute migrations
     */
    public function up()
    {
        $this->updateOrInsertSettings(static::$NEW_FONTAWESOME_LINK, static::$NEW_FONTAWESOME_LINK_ATTRIBUTES);
    }

    /**
     * Rollback migrations
     */
    public function down()
    {
        $this->updateOrInsertSettings(static::$PREVIOUS_FONTAWESOME_LINK, static::$PREVIOUS_FONTAWESOME_LINK_ATTRIBUTES);
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
