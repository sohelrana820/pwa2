<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectsMeta
 * @package App\Models
 */
class ProjectsMeta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "projects_meta";

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
        'project_id',
        'meta_key',
        'meta_value',
    ];
}
