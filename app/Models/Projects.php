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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectMeta() {
        return $this->hasMany(ProjectsMeta::class, 'project_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectImages() {
        return $this->hasMany('App\Models\ProjectsImages', 'project_id', 'id');
    }

    /**
     * Destroy a project with it's data
     *
     * @param int $id
     * @return bool
     */
    public static function deleteProject(int $id)
    {
        try {
            $deleted = static::find($id)->delete();
            if($deleted) {
                ProjectsMeta::where('project_id', $id)->delete();
            }

            if($deleted) {
                return true;
            }
        } catch (\Exception $exception) {

        }

        return false;
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'LIKE', "%$search%")
            ->orWhereHas('projectMeta', function($q) use ($search) {
                $q->where(function($q) use ($search) {
                    $q->where('meta_value', 'LIKE', '%' . $search . '%');
                });
            });
    }
}
