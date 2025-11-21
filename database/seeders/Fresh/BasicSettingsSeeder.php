<?php

namespace Database\Seeders\Fresh;

use Illuminate\Database\Seeder;
use App\Models\Admin\BasicSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BasicSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basic_settings = array(
            array('id' => '1','site_name' => 'AdRadio','site_title' => 'Online Radio Streaming Platform','base_color' => '#E67E22','secondary_color' => '#F5F6FC','otp_exp_seconds' => '3200','web_version' => '1.4.0','location' => NULL,'timezone' => 'Asia/Dhaka','force_ssl' => '1','user_registration' => '1','secure_password' => '1','agree_policy' => '1','email_verification' => '1','email_notification' => '1','push_notification' => '1','site_logo_dark' => 'a413629a-c53d-4a03-a659-6b182edb5ff7.webp','site_logo' => 'a92a2076-ee30-4184-ad43-f23068e4dfc1.webp','site_fav_dark' => '8e4284fd-618e-42ac-9fa9-08931450396b.webp','site_fav' => '188c8350-cb49-43e5-8762-3d921148fe2a.webp','mail_config' => '{"method":"","host":"","port":"","encryption":"ssl","username":"","password":"","from":"","app_name":"AdRadio"}','mail_activity' => NULL,'push_notification_config' => '{"method":"","instance_id":"","primary_key":""}','push_notification_activity' => NULL,'broadcast_config' => '{"method":"","app_id":"","primary_key":"","secret_key":"","cluster":"ap2"}','broadcast_activity' => NULL,'sms_config' => NULL,'sms_activity' => NULL,'created_at' => '2023-10-26 13:32:53','updated_at' => '2023-10-31 17:11:12')
          );

        BasicSettings::insert($basic_settings);
    }
}
