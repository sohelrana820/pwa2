<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Role
 * @package App\Models
 */
class Role extends Model
{
    /**
     * The constant value of super admin
     *
     * @var string
     */
    const SUPER_ADMIN = "super_admin";

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "roles";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_name',
        'role_slug',
        'role_detail'
    ];
}
