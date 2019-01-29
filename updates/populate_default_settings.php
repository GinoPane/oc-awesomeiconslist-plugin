<?php

namespace GinoPane\AwesomeIconsList\Updates;

use DB;
use Schema;
use October\Rain\Database\Updates\Migration;
use GinoPane\AwesomeIconsList\Models\Settings;

/**
 * Class PopulateDefaultSettings
 *
 * @package GinoPane\AwesomeIconsList\Updates
 */
class PopulateDefaultSettings extends Migration
{
    /**
     * Execute migrations
     */
    public function up()
    {
        $this->addSettings();
    }

    /**
     * Rollback migrations
     */
    public function down()
    {
        $this->removeSettings();
    }

    /**
     * Remove settings
     */
    private function removeSettings()
    {
        if (Schema::hasTable('system_settings')) {
            DB::table('system_settings')->whereItem(Settings::SETTINGS_CODE)->delete();
        }
    }

    /**
     * Add settings
     */
    private function addSettings()
    {
        if (Schema::hasTable('system_settings')) {
            $settings = [
               Settings::FONTAWESOME_LINK_KEY => Settings::FONTAWESOME_LINK,
               Settings::FONTAWESOME_LINK_ATTRIBUTES_KEY => Settings::FONTAWESOME_LINK_ATTRIBUTES
            ];

            DB::table('system_settings')->insert(
                ['item' => Settings::SETTINGS_CODE, 'value' => json_encode($settings)]
            );
        }
    }
}
