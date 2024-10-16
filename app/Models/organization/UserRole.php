<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserRole extends Authenticatable
{
  use HasFactory;
  protected $table = 'org_user_roles';
	protected $fillable = ['role','desc','is_active','created_at','is_deleted'];
  protected $guarded = [];  
	
	static function getUserRoles(){ 
         $permanent = array(1);
            
           $userroles = UserRole::where(function ($query) { $query->where('is_deleted', '=', NULL)->orWhere('is_deleted', '=', 0);})->whereNotIn('id', $permanent)->orderBy('id', 'DESC')->get();     
         

            if($userroles){ 
            $data               =   [];
            foreach($userroles    as  $row){
            $data[$row->id]['id']        =   $row->id;
            $data[$row->id]['usr_role_name']        =   $row->role;
            $data[$row->id]['usr_role_desc']        =   $row->desc;
            $data[$row->id]['usr_role_type']        =   $row->role_type;
            $data[$row->id]['is_active']       =   $row->is_active;
            $data[$row->id]['is_deleted']       =   $row->is_deleted;
            $data[$row->id]['created_at']       =   $row->created_at; 
            }

            return $data;
            }else{ return false; }

    }
	static function ValidateUnique($role,$id) {
        $query = UserRole::where('role',$role)->where('is_deleted',0)->first();
        if($query){
			if($query->id       !=  $id){ 
				return 'This User role name already has been taken'; 
			}else{ return false; }
        }else{ return false; }
    }
	
    
}
