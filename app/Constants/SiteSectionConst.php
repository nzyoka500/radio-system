<?php

namespace App\Constants;

class SiteSectionConst{
    const BANNER_SECTION = "Banner Section";
    const ABOUT_SECTION = "About Section";
    const CONTACT_SECTION = "Contact Section";
    const TEAM_SECTION = "Team Section";
    const DAILY_SCHEDULE_SECTION = "Daily Schedule Section";
    const VIDEO_SECTION = "Video Section";
    const GALLERY_SECTION = "Gallery Section";
    const TESTIMONIAL_SECTION    = "Testimonial Section";
    const ANNOUNCEMENT_SECTION = "Announcement Section";
    const FOOTER_SECTION = "Footer Section";
    const AUTH_SECTION = "Auth Section";


    const NOT_DISPLAY_COOKIE_SECTION     = "site_cookie";
    const NOT_DISPLAY_AUTH_SECTION       = "auth-section";
    const NOT_DISPLAY_FOOTER_SECTION     = "footer-section";
    
    public static function notDisplaySections(): array{
            return [
                self::NOT_DISPLAY_COOKIE_SECTION,
                self::NOT_DISPLAY_AUTH_SECTION,
                self::NOT_DISPLAY_FOOTER_SECTION
            ];
    }
}
