<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;
use App\Models\Admin\SetupPageHasSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionHasPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $setup_page_has_sections = array(
        array('id' => '1','setup_page_id' => '19','site_section_id' => '4','position' => '1','status' => '1','created_at' => '2025-09-11 11:04:51','updated_at' => '2025-09-11 11:29:08'),
        array('id' => '2','setup_page_id' => '19','site_section_id' => '3','position' => '4','status' => '0','created_at' => '2025-09-11 11:04:51','updated_at' => '2025-09-11 11:36:18'),
        array('id' => '3','setup_page_id' => '19','site_section_id' => '5','position' => '2','status' => '1','created_at' => '2025-09-11 11:04:51','updated_at' => '2025-09-11 11:36:18'),
        array('id' => '4','setup_page_id' => '19','site_section_id' => '6','position' => '3','status' => '1','created_at' => '2025-09-11 11:04:51','updated_at' => '2025-09-11 11:36:18'),
        array('id' => '5','setup_page_id' => '19','site_section_id' => '7','position' => '5','status' => '0','created_at' => '2025-09-11 11:04:51','updated_at' => '2025-09-11 11:36:18'),
        array('id' => '6','setup_page_id' => '19','site_section_id' => '8','position' => '6','status' => '0','created_at' => '2025-09-11 11:04:51','updated_at' => '2025-09-11 11:36:18'),
        array('id' => '7','setup_page_id' => '19','site_section_id' => '10','position' => '7','status' => '0','created_at' => '2025-09-11 11:04:51','updated_at' => '2025-09-11 11:36:18'),
        array('id' => '8','setup_page_id' => '19','site_section_id' => '11','position' => '8','status' => '0','created_at' => '2025-09-11 11:04:51','updated_at' => '2025-09-11 11:36:18'),
        array('id' => '9','setup_page_id' => '19','site_section_id' => '12','position' => '9','status' => '0','created_at' => '2025-09-11 11:04:51','updated_at' => '2025-09-11 11:36:18'),
        array('id' => '10','setup_page_id' => '20','site_section_id' => '7','position' => '1','status' => '1','created_at' => '2025-09-11 11:37:28','updated_at' => '2025-09-11 11:37:28'),
        array('id' => '11','setup_page_id' => '20','site_section_id' => '6','position' => '2','status' => '1','created_at' => '2025-09-11 11:37:28','updated_at' => '2025-09-11 11:37:28'),
        array('id' => '12','setup_page_id' => '20','site_section_id' => '3','position' => '3','status' => '0','created_at' => '2025-09-11 11:37:28','updated_at' => '2025-09-11 11:40:06'),
        array('id' => '13','setup_page_id' => '20','site_section_id' => '4','position' => '4','status' => '0','created_at' => '2025-09-11 11:37:28','updated_at' => '2025-09-11 11:37:28'),
        array('id' => '14','setup_page_id' => '20','site_section_id' => '5','position' => '5','status' => '0','created_at' => '2025-09-11 11:37:28','updated_at' => '2025-09-11 11:37:28'),
        array('id' => '15','setup_page_id' => '20','site_section_id' => '8','position' => '6','status' => '0','created_at' => '2025-09-11 11:37:28','updated_at' => '2025-09-11 11:37:28'),
        array('id' => '16','setup_page_id' => '20','site_section_id' => '10','position' => '7','status' => '0','created_at' => '2025-09-11 11:37:28','updated_at' => '2025-09-11 11:37:28'),
        array('id' => '17','setup_page_id' => '20','site_section_id' => '11','position' => '8','status' => '0','created_at' => '2025-09-11 11:37:28','updated_at' => '2025-09-11 11:37:28'),
        array('id' => '18','setup_page_id' => '20','site_section_id' => '12','position' => '9','status' => '0','created_at' => '2025-09-11 11:37:28','updated_at' => '2025-09-11 11:37:28'),
        array('id' => '19','setup_page_id' => '21','site_section_id' => '8','position' => '1','status' => '1','created_at' => '2025-09-11 11:40:29','updated_at' => '2025-09-11 11:43:12'),
        array('id' => '20','setup_page_id' => '21','site_section_id' => '3','position' => '2','status' => '0','created_at' => '2025-09-11 11:40:29','updated_at' => '2025-09-11 11:43:12'),
        array('id' => '21','setup_page_id' => '21','site_section_id' => '4','position' => '3','status' => '0','created_at' => '2025-09-11 11:40:29','updated_at' => '2025-09-11 11:40:29'),
        array('id' => '22','setup_page_id' => '21','site_section_id' => '5','position' => '4','status' => '0','created_at' => '2025-09-11 11:40:29','updated_at' => '2025-09-11 11:43:49'),
        array('id' => '23','setup_page_id' => '21','site_section_id' => '6','position' => '5','status' => '0','created_at' => '2025-09-11 11:40:29','updated_at' => '2025-09-11 11:40:29'),
        array('id' => '24','setup_page_id' => '21','site_section_id' => '7','position' => '6','status' => '0','created_at' => '2025-09-11 11:40:29','updated_at' => '2025-09-11 11:40:29'),
        array('id' => '25','setup_page_id' => '21','site_section_id' => '10','position' => '7','status' => '0','created_at' => '2025-09-11 11:40:29','updated_at' => '2025-09-11 11:40:29'),
        array('id' => '26','setup_page_id' => '21','site_section_id' => '11','position' => '8','status' => '0','created_at' => '2025-09-11 11:40:29','updated_at' => '2025-09-11 11:40:29'),
        array('id' => '27','setup_page_id' => '21','site_section_id' => '12','position' => '9','status' => '0','created_at' => '2025-09-11 11:40:29','updated_at' => '2025-09-11 11:40:29'),
        array('id' => '28','setup_page_id' => '22','site_section_id' => '11','position' => '1','status' => '1','created_at' => '2025-09-11 11:47:02','updated_at' => '2025-09-11 11:47:02'),
        array('id' => '29','setup_page_id' => '22','site_section_id' => '3','position' => '2','status' => '0','created_at' => '2025-09-11 11:47:02','updated_at' => '2025-09-11 11:57:16'),
        array('id' => '30','setup_page_id' => '22','site_section_id' => '4','position' => '3','status' => '0','created_at' => '2025-09-11 11:47:02','updated_at' => '2025-09-11 11:57:16'),
        array('id' => '31','setup_page_id' => '22','site_section_id' => '5','position' => '4','status' => '0','created_at' => '2025-09-11 11:47:02','updated_at' => '2025-09-11 11:57:16'),
        array('id' => '32','setup_page_id' => '22','site_section_id' => '6','position' => '5','status' => '0','created_at' => '2025-09-11 11:47:02','updated_at' => '2025-09-11 11:57:16'),
        array('id' => '33','setup_page_id' => '22','site_section_id' => '7','position' => '6','status' => '0','created_at' => '2025-09-11 11:47:02','updated_at' => '2025-09-11 11:47:02'),
        array('id' => '34','setup_page_id' => '22','site_section_id' => '8','position' => '7','status' => '0','created_at' => '2025-09-11 11:47:02','updated_at' => '2025-09-11 11:47:02'),
        array('id' => '35','setup_page_id' => '22','site_section_id' => '10','position' => '8','status' => '0','created_at' => '2025-09-11 11:47:02','updated_at' => '2025-09-11 11:47:02'),
        array('id' => '36','setup_page_id' => '22','site_section_id' => '12','position' => '9','status' => '0','created_at' => '2025-09-11 11:47:02','updated_at' => '2025-09-11 11:47:02'),
        array('id' => '37','setup_page_id' => '23','site_section_id' => '10','position' => '1','status' => '1','created_at' => '2025-09-11 12:03:28','updated_at' => '2025-09-11 12:03:28'),
        array('id' => '38','setup_page_id' => '23','site_section_id' => '3','position' => '2','status' => '0','created_at' => '2025-09-11 12:03:28','updated_at' => '2025-09-11 12:03:47'),
        array('id' => '39','setup_page_id' => '23','site_section_id' => '4','position' => '3','status' => '0','created_at' => '2025-09-11 12:03:28','updated_at' => '2025-09-11 12:03:47'),
        array('id' => '40','setup_page_id' => '23','site_section_id' => '5','position' => '4','status' => '0','created_at' => '2025-09-11 12:03:28','updated_at' => '2025-09-11 12:03:47'),
        array('id' => '41','setup_page_id' => '23','site_section_id' => '6','position' => '5','status' => '0','created_at' => '2025-09-11 12:03:28','updated_at' => '2025-09-11 12:03:28'),
        array('id' => '42','setup_page_id' => '23','site_section_id' => '7','position' => '6','status' => '0','created_at' => '2025-09-11 12:03:28','updated_at' => '2025-09-11 12:03:28'),
        array('id' => '43','setup_page_id' => '23','site_section_id' => '8','position' => '7','status' => '0','created_at' => '2025-09-11 12:03:28','updated_at' => '2025-09-11 12:03:28'),
        array('id' => '44','setup_page_id' => '23','site_section_id' => '11','position' => '8','status' => '0','created_at' => '2025-09-11 12:03:28','updated_at' => '2025-09-11 12:03:28'),
        array('id' => '45','setup_page_id' => '23','site_section_id' => '12','position' => '9','status' => '0','created_at' => '2025-09-11 12:03:28','updated_at' => '2025-09-11 12:03:28'),
        array('id' => '46','setup_page_id' => '18','site_section_id' => '3','position' => '1','status' => '1','created_at' => '2025-09-11 12:05:09','updated_at' => '2025-09-11 12:05:09'),
        array('id' => '47','setup_page_id' => '18','site_section_id' => '4','position' => '2','status' => '1','created_at' => '2025-09-11 12:05:09','updated_at' => '2025-09-11 12:05:09'),
        array('id' => '48','setup_page_id' => '18','site_section_id' => '5','position' => '7','status' => '1','created_at' => '2025-09-11 12:05:09','updated_at' => '2025-09-11 12:12:18'),
        array('id' => '49','setup_page_id' => '18','site_section_id' => '6','position' => '5','status' => '1','created_at' => '2025-09-11 12:05:09','updated_at' => '2025-09-11 12:10:58'),
        array('id' => '50','setup_page_id' => '18','site_section_id' => '7','position' => '6','status' => '1','created_at' => '2025-09-11 12:05:09','updated_at' => '2025-09-11 12:10:58'),
        array('id' => '51','setup_page_id' => '18','site_section_id' => '8','position' => '4','status' => '1','created_at' => '2025-09-11 12:05:09','updated_at' => '2025-09-11 12:12:18'),
        array('id' => '52','setup_page_id' => '18','site_section_id' => '10','position' => '9','status' => '0','created_at' => '2025-09-11 12:05:09','updated_at' => '2025-09-11 12:12:18'),
        array('id' => '53','setup_page_id' => '18','site_section_id' => '11','position' => '8','status' => '1','created_at' => '2025-09-11 12:05:09','updated_at' => '2025-09-11 12:12:18'),
        array('id' => '54','setup_page_id' => '18','site_section_id' => '12','position' => '3','status' => '1','created_at' => '2025-09-11 12:05:09','updated_at' => '2025-09-11 12:10:58')
        );

        SetupPageHasSection::upsert($setup_page_has_sections,['id'],['setup_page_id','site_section_id','position','status']);
    }
}
