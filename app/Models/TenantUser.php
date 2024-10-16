<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TenantUser
 * @package App\Models
 * @version October 16, 2024, 2:40 pm UTC
 *
 * @property varchar $name
 * @property varchar $email
 * @property varchar $phone
 * @property varchar $address
 * @property int $gender
 */
class TenantUser extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tenant_users';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'password' => 'required'
    ];


}
