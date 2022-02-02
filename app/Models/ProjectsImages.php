<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectsImages
 * @package App\Models
 */
class ProjectsImages extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "projects_images";

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
        'url_path',
    ];
}
