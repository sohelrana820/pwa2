<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRole
 * @package App\Models
 */
class UserRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "user_roles";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'role_id'
    ];

    /**
     * Make one to one relation with mm_admin_roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Make one to one relation with mm_admin_users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get Usre's active role
     *
     * @return mixed
     */
    public static function getActiveUserRole()
    {
        return self::where('user_id', auth()->user()->id)
            ->where('active_status', 1)
            ->first();
    }

    /**
     * Assign a new role to user
     *
     * @param int $userId
     * @return bool | UserRole
     */
    public static function assignRole(int $userId)
    {
        $createdUserRole = static::create([
            'user_id' => $userId,
            'role_id' => 2,
        ]);

        return true;
    }
}
