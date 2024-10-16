<?php
use App\Models\CmsContent;
use App\Models\Organization\UserRole;
use App\Models\OrganizationDepartment;
use App\Models\OrganizationDesignation;

use App\Models\Setting;
use App\Models\Organization\Modules;
use App\Models\Admin;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\AppVersion;
use App\Models\Domains;
use App\Models\Organization\TrainingProgramContentType;
use App\Models\Organization\ContentPoolType;
use App\Models\Organization\OrganizationUserRoleAction;
use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('OrgroleData')) {
    function OrgroleData() { return UserRole::where('id', auth()->user()->role_id)->first();  }
}
if (!function_exists('getTenantDomain')) {
    function getTenantDomain() { if(tenant()){ return tenant()->domainInfo->domain; }else {

        $central = \Config::get('services.central.app');
        return $central; }  }
}
if (!function_exists('tenantAsset')) {
    function tenantAsset() { return $tenant_url = "//".getTenantDomain()."/public/"; }
}
if (!function_exists('tenantStorage')) {
    function tenantStorage() { return $tenant_url = "//".getTenantDomain()."/storage/"; }
}


if (!function_exists('checkOrganizationPermission')) {
    function checkOrganizationPermission($slug,$act)
    {
        if (auth()->user()->role_id == 1) {
            return true;
        }
    }
}




