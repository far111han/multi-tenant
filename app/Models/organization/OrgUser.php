<?php

namespace App\Models\Organization;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class OrgUser extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['fname','lname','email','isd_code','phone','password','role_id','branch_id','department_id','designation','group_id','job_title','avatar','is_temporary','end_date','is_active','created_by',];
    protected $guarded = [];
    protected $guard = 'management';

    public function role(){
        return $this->belongsTo(UserRole ::class, 'role_id');
    }
}
