<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class OrganizationUserRoleAction extends Model
{
    use HasFactory;
    protected $table = 'org_usr_role_action';
	
	static function getAllActions($role_id){ 
        $allactions  =  DB::table('org_usr_role_action')->where('usr_role_id',$role_id)->get();
        return $allactions;
    }
}
