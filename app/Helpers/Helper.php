<?php
use App\Models\CmsContent;
use App\Models\UserRole;
use App\Models\OrganizationDepartment;
use App\Models\OrganizationBranch;
use App\Models\Setting;
use App\Models\Modules;
use App\Models\Admin;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\AppVersion;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Auth;
use \Firebase\JWT\JWT;
if (!function_exists('geSiteName')) {

    function geSiteName() {
        $data = DB::table('settings')->where('type', 'site_name')->where('is_deleted', 0)->first();
        if ($data) {
            return $data->value;
        } else {
            return 'BS';
        }
    }

}if (!function_exists('geAdminName')) {

    function geAdminName() {
        $data = DB::table('settings')->where('type', 'admin_name')->where('is_deleted', 0)->first();
        if ($data) {
            return $data->value;
        } else {
            return 'Admin';
        }
    }

}if (!function_exists('geAdminEmail')) {

    function geAdminEmail() {
        $data = DB::table('settings')->where('type', 'admin_email')->where('is_deleted', 0)->first();
        if ($data) {
            return $data->value;
        } else {
            return 'admin@gameday.com';
        }
    }

}
