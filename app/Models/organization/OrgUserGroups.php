<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class OrgUserGroups extends Authenticatable
{
    use HasFactory;
	protected $table = 'org_user_groups';
	
	
}
