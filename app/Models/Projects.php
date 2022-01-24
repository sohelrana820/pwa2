<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Projects
 * @package App\Models
 */
class Projects extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "projects";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $timestamp = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
