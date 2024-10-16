<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Country;

//@2023
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//@2023 ends
class OrganizationUsers extends Authenticatable
{
    use HasFactory;
    protected $table = 'org_users';
    protected $guarded = [];
    protected $guard = 'organization';

    public $fillable = [

        // 'fname',
        // 'lname',
        // 'email',
        // 'isd_code',
        // 'phone',
        // 'password',
        // 'job_title',
        // 'is_temporary',
        // 'end_date',
		// 'role_id',
        // 'branch_id',
        // 'department_id',
        // 'designation',
        // 'is_active'

    ];

    /* public function __construct()
    {
        echo $this->table;
        echo $this->guard;
        dd($this->guarded);
        exit;
    } */


    public function role(){ return $this->belongsTo(UserRole ::class, 'role_id'); }
	static function ValidateUnique($field,$post,$id) {
        $query                  =   OrganizationUsers::where($field,$post['email'])->first();
        if($query){
            if($query->id       !=  $id){
                if($query->status   ==  0){ return 'This '. $field .' account has been disabled'; }
                return 'This '.$field.' already has been taken';
            }
        }else{ return false; }
    }
	static function ValidateEmailUnique($field,$post) {
        $query                  =   OrganizationUsers::where($field,$post['email'])->where('is_deleted',0)->first();
        if($query){


                return 'This '.$field.' already has been taken';

        }else{ return false; }
    }
	static function ValidatePhoneUnique($field,$post){
        $query                  =   OrganizationUsers::where($field,$post['phone'])->where('isd_code',$post['isd_code'])->where('is_deleted',0)->first();
        if($query){

            return 'This phone already has been taken';

        }else{ return false; }
    }
    static function ValidatePhone($field,$post,$id){
		$phone=explode(" ",$post['mobile-number']);
        $query                  =   OrganizationUsers::where($field,$phone[1])->where('isd_code',$phone[0])->first();
        if($query){
            if($query->id       !=  $id){
                if($query->status   ==  0){ return 'This account has been disabled'; }
                return 'This phone already has been taken';
            }
        }else{ return false; }
    }

}
