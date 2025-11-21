<<<<<<<< Update Guide >>>>>>>>>>>

Clone Version:1.3.0
Immediate Older Version: 1.3.0
Current Version: 1.4.0

Update Features:
1. Admin can now add new users based on project registration data.
2. Added the ability to manage dynamic sections from the admin panel.
3. Updated the Extensions section to check whether credentials are filled in.
4. Added an All Notifications page to the admin panel.
6. Error logs are now viewable in the admin panel, with the option to clear them.
8. Updated the roles and permissions management system.


Please Use Those Command On Your Terminal To Update v1.3.0 to v1.4.0

1. Update Composer To Add New Package (Make Sure Your Targeted Location Is Project Root)
    composer update

2. To Added New Migration File
    php artisan migrate

3. To Update/Added All Seeder (Make Sure Your Targeted Location Is Project Root)
    php artisan db:seed --class=Database\\Seeders\\Update\\VersionUpdateSeeder



7. To clear view file cache (Make Sure Your Targeted Location Is Project Root)
    php artisan view:clear

---------------------------------------------------------------------------------

Fresh Installation Guide
1. Update Composer To Update All PHP/Laravel Packages
    composer update

2. Seed Database With Necessary Data
    php artisan migrate:fresh --seed

3. Create Token For API Authentication By Run The Command Below
    php artisan passport:install
