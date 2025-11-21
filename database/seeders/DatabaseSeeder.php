<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\User\UserSeeder;
use Database\Seeders\Admin\RoleSeeder;
use Database\Seeders\Admin\AdminSeeder;
use Database\Seeders\Admin\LanguageSeeder;
use Database\Seeders\Admin\SetupSeoSeeder;
use Database\Seeders\Admin\DemoAdminSeeder;
use Database\Seeders\Admin\ExtensionSeeder;
use Database\Seeders\Admin\SetupPageSeeder;
use Database\Seeders\Admin\AppOnBoardSeeder;
use Database\Seeders\Admin\AppSettingsSeeder;
use Database\Seeders\Admin\ScheduleDaySeeder;
use Database\Seeders\Admin\AdminHasRoleSeeder;
use Database\Seeders\Admin\AnnouncementSeeder;
use Database\Seeders\Admin\SiteSectionsSeeder;
use Database\Seeders\Admin\BasicSettingsSeeder;
use Database\Seeders\Admin\DailyScheduleSeeder;
use Database\Seeders\Admin\SectionHasPageSeeder;
use Database\Seeders\Admin\SystemMaintenanceSeeder;
use Database\Seeders\Admin\AnnouncementCategorySeeder;
use Database\Seeders\Fresh\BasicSettingsSeeder as FreshBasicSettingsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // //Demo Seeder
        // $this->call([
        //     DemoAdminSeeder::class,
        //     RoleSeeder::class,
        //     BasicSettingsSeeder::class,
        //     SetupSeoSeeder::class,
        //     AppSettingsSeeder::class,
        //     AppOnBoardSeeder::class,
        //     SiteSectionsSeeder::class,
        //     ExtensionSeeder::class,
        //     AdminHasRoleSeeder::class,
        //     UserSeeder::class,
        //     SetupPageSeeder::class,
        //     ScheduleDaySeeder::class,
        //     DailyScheduleSeeder::class,
        //     LanguageSeeder::class,
        //     AnnouncementCategorySeeder::class,
        //     AnnouncementSeeder::class,
        //     SystemMaintenanceSeeder::class,

        //     SectionHasPageSeeder::class
        // ]);

        //fresh seeder
        $this->call([
            AdminSeeder::class,
            RoleSeeder::class,
            FreshBasicSettingsSeeder::class,
            SetupSeoSeeder::class,
            AppSettingsSeeder::class,
            AppOnBoardSeeder::class,
            SiteSectionsSeeder::class,
            ExtensionSeeder::class,
            AdminHasRoleSeeder::class,
            SetupPageSeeder::class,
            LanguageSeeder::class,
            AnnouncementCategorySeeder::class,
            AnnouncementSeeder::class,
            SystemMaintenanceSeeder::class,
        
            SectionHasPageSeeder::class
        ]);
    }
}
