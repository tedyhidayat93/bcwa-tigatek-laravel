<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Config;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Program;
use Illuminate\Support\Facades\View;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        $footer_links = Page::where('is_active', 1)
            ->where('is_show_in_footer', 1)
            ->get();

        $faqs = Faq::where('is_active', 1)
            ->orderBY('sequence', 'ASC')
            ->get();

        $this->app->singleton('confighelper', function () {
            return new Config();
        });

        $path_logo = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_LOGO');
        if (!empty($path_logo)) {
            $path_logo = asset('assets/settings/normal').'/'.$path_logo;
        } else {
            $path_logo = asset('assets/fe-page/images/logo.png');
        }

        $brand_name = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_NAME');
        $brand_name = !empty($brand_name) ? $brand_name : 'DEFAULT APP';

        $brand_tagline = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_TAGLINE');
        $brand_tagline = !empty($brand_tagline) ? $brand_tagline : '';

        $about_us = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_ABOUT_ME');
        $about_us = !empty($about_us) ? $about_us : '';

        $footer_brand = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_FOOTER_BRAND');
        $footer_brand = !empty($footer_brand) ? $footer_brand : '';

        $footer_caption = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_CAPTION');
        $footer_caption = !empty($footer_caption) ? $footer_caption : '';

        $operational_hours = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_OPERATIONAL_HOURS');
        $operational_hours = !empty($operational_hours) ? $operational_hours : '';

        $about_us_link = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_LINK_ABOUT_ME');
        $about_us_link = !empty($about_us_link) ? $about_us_link : '';

        $about_vission = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_VISION');
        $about_vission = !empty($about_vission) ? $about_vission : '';

        $about_mission = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_MISSION');
        $about_mission = !empty($about_mission) ? $about_mission : '';

        $company_profile = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_COMPANY_PROFILE');
        $company_profile = !empty($company_profile) ? $company_profile : '';

        $gmaps = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_GMAPS');
        $gmaps = !empty($gmaps) ? $gmaps : '';

        $address = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_ADDRESS');
        $address = !empty($address) ? $address : '';

        $seo_meta_keyword = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_META_KEYWORD');
        $seo_meta_keyword = !empty($seo_meta_keyword) ? $seo_meta_keyword : '';
        $seo_meta_description = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_META_DESCRIPTION');
        $seo_meta_description = !empty($seo_meta_description) ? $seo_meta_description : '';

        $email = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_EMAIL');
        $email = !empty($email) ? $email : '';
        $phone = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_CONTACT');
        $phone = !empty($phone) ? $phone : '';
        $whatsapp = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_WHATSAPP');
        $whatsapp = !empty($whatsapp) ? $whatsapp : '';
        $instagram = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_INSTAGRAM');
        $instagram = !empty($instagram) ? $instagram : '';
        $x = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_X');
        $x = !empty($x) ? $x : '';
        $facebook = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_FACEBOOK');
        $facebook = !empty($facebook) ? $facebook : '';
        $youtube = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_YOUTUBE');
        $youtube = !empty($youtube) ? $youtube : '';
        $tiktok = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_TIKTOK');
        $tiktok = !empty($tiktok) ? $tiktok : '';
        $linkedin = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_LINKEDIN');
        $linkedin = !empty($linkedin) ? $linkedin : '';

        // Medizine
        $medizine_default_thumbnail = app('confighelper')->getConfig('MEDIZINE', 'MEDIZINE_DEFAULT_THUMBNAIL_SHARE');
        $medizine_default_thumbnail = !empty($medizine_default_thumbnail) ? $medizine_default_thumbnail : '';
        $medizine_default_meta_keywords = app('confighelper')->getConfig('MEDIZINE', 'MEDIZINE_DEFAULT_META_KEYWORD');
        $medizine_default_meta_keywords = !empty($medizine_default_meta_keywords) ? $medizine_default_meta_keywords : '';
        $medizine_default_meta_description = app('confighelper')->getConfig('MEDIZINE', 'MEDIZINE_DEFAULT_META_DESCRIPTION');
        $medizine_default_meta_description = !empty($medizine_default_meta_description) ? $medizine_default_meta_description : '';
        $medizine_term = Page::where('code', 'MEDIZINE')->first();

        // Bank Transfer
        $bank_trf_name = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_BANK_NAME');
        $bank_trf_name = !empty($bank_trf_name) ? $bank_trf_name : '';
        $bank_trf_reknumber = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_BANK_REKENING_NUMBER');
        $bank_trf_reknumber = !empty($bank_trf_reknumber) ? $bank_trf_reknumber : '';
        $bank_trf_atasnama = app('confighelper')->getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_BANK_OWNER');
        $bank_trf_atasnama = !empty($bank_trf_atasnama) ? $bank_trf_atasnama : '';
        // dd([
        //     'bank_name' => $bank_trf_name,
        //     'bank_norek' => $bank_trf_reknumber,
        //     'bank_owner' => $bank_trf_atasnama,
        // ]);

        // GLOBAL SK TERMS
        $global_term = Page::where('code', 'TERMS_CONDITION')->first();

        // dd($global_term->slug);
        // Xendit Payment Gateway
        $payment_gateway_environtment_mode = app('confighelper')->getConfig('PAYMENT_GATEWAY', 'PAYMENT_GATEWAY_MODE');
        $payment_gateway_environtment_mode = !empty($payment_gateway_environtment_mode) ? $payment_gateway_environtment_mode : '';
        $xendit_payment_gateway_global_admin_fee = app('confighelper')->getConfig('PAYMENT_GATEWAY', 'XENDIT_PAYMENT_GATEWAY_GLOBAL_ADMIN_FEE');
        $xendit_payment_gateway_global_admin_fee = !empty($xendit_payment_gateway_global_admin_fee) ? $xendit_payment_gateway_global_admin_fee : '';
        $xendit_payment_gateway_api_key_development = app('confighelper')->getConfig('PAYMENT_GATEWAY', 'XENDIT_PAYMENT_GATEWAY_API_KEY_DEVELOPMENT');
        $xendit_payment_gateway_api_key_development = !empty($xendit_payment_gateway_api_key_development) ? $xendit_payment_gateway_api_key_development : '';
        $xendit_payment_gateway_api_key_production = app('confighelper')->getConfig('PAYMENT_GATEWAY', 'XENDIT_PAYMENT_GATEWAY_API_KEY_PRODUCTION');
        $xendit_payment_gateway_api_key_production = !empty($xendit_payment_gateway_api_key_production) ? $xendit_payment_gateway_api_key_production : '';
        $xendit_payment_gateway_token_callback_production = app('confighelper')->getConfig('PAYMENT_GATEWAY', 'XENDIT_PAYMENT_GATEWAY_TOKEN_CALLBACK_PRODUCTION');
        $xendit_payment_gateway_token_callback_production = !empty($xendit_payment_gateway_token_callback_production) ? $xendit_payment_gateway_token_callback_production : '';
        $xendit_payment_gateway_token_callback_development = app('confighelper')->getConfig('PAYMENT_GATEWAY', 'XENDIT_PAYMENT_GATEWAY_TOKEN_CALLBACK_DEVELOPMENT');
        $xendit_payment_gateway_token_callback_development = !empty($xendit_payment_gateway_token_callback_development) ? $xendit_payment_gateway_token_callback_development : '';

        // dd($gmaps);

        View::share([
            'path_logo' => $path_logo,
            'brand_name' => $brand_name,
            'brand_tagline' => $brand_tagline,
            'about_us' => $about_us,
            'about_us_vision' => $about_vission,
            'about_us_mision' => $about_mission,
            'about_us_link' => $about_us_link,
            'company_profile_doc' => $company_profile,
            'operational_hours' => $operational_hours,
            'gmaps' => $gmaps,
            'address' => $address,
            'footer_caption' => $footer_caption,
            'footer_brand' => $footer_brand,
            'footer_links' => $footer_links,
            'faqs' => $faqs,
            'contact' => [
                'email' => $email,
                'phone' => $phone,
                'whatsapp' => $whatsapp,
            ],
            'socmed' => [
                'instagram' => $instagram,
                'x' => $x,
                'facebook' => $facebook,
                'tiktok' => $tiktok,
                'youtube' => $youtube,
                'linkedin' => $linkedin,
            ],
            'bank' => [
                'bank_name' => $bank_trf_name,
                'bank_norek' => $bank_trf_reknumber,
                'bank_owner' => $bank_trf_atasnama,
            ],
            'seo' => [
                'default_meta_keywords' => $seo_meta_keyword,
                'default_meta_description' => $seo_meta_description,
                'medizine' => [
                    'default_meta_keywords' => $medizine_default_meta_keywords,
                    'default_meta_description' => $medizine_default_meta_description
                ]
            ],
            'default_bg' => [
                'program'=> null ?? 'default-program-bg.png',
                'mentor'=> null ?? 'default-mentor-bg.png',
                'medizine' => [
                    'category' => null ?? 'default-category-article-bg.png',
                    'default_thumb_shared' => $medizine_default_thumbnail,
                    'post' => null ?? 'default-article-bg.png'
                ],
                'medmaestro' => [
                    'product' => [
                        'category' => null ?? 'default-category-product-bg.png',
                        'thumb_shared' => null ?? 'default-product-bg.png',
                        'item' => null ?? 'default-product-bg.png'
                    ],
                    'event' => [
                        'category' => null ?? 'default-category-event-bg.png',
                        'thumb_shared' => null ?? 'default-event-bg.png',
                        'item' => null ?? 'default-event-bg.png'
                    ],
                ],
                'layout' => [
                    'homepage' => [
                        'hero' => ''
                    ],
                    'about' => [
                        'head_banner' => '',
                        'mascot' => ''
                    ],
                ]
            ],
            'pages' => [
                'medizine' => [
                    'terms' => $medizine_term
                ],
                'global' => [
                    'terms' => $global_term
                ]
            ],
            'payment_gateway' => [
                'environtment_mode' => $payment_gateway_environtment_mode,
                'xendit' => [
                    'global_admin_fee' => $xendit_payment_gateway_global_admin_fee,
                    'api_key_development' => $xendit_payment_gateway_api_key_development,
                    'api_key_production' => $xendit_payment_gateway_api_key_production,
                    'token_callback_development' => $xendit_payment_gateway_token_callback_development,
                    'token_callback_production' => $xendit_payment_gateway_token_callback_production,
                ]
            ]
        ]);
    }
}
