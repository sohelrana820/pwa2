<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

/**
 * Class User
 * @package App\Models
 */
class User  extends Authenticatable
{
    use HasFactory;

    /**
     * Super admin email address
     *
     * @var string
     */
    const SUPER_ADMIN_EMAIL = 'superadmin@gmail.com';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "users";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Make one to one relation with mm_admin_user_roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userRole(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserRole::class, 'user_id')
            ->with('role');
    }

    /**
     * Get All Users except super admin
     *
     * @return User|null
     */
    public static function getAllUser()
    {
        /**
         * Fetched the users list from db table 'users'
         *
         * @var $users = [▼
            0 => array:5 [▼
            "id" => 1
            "first_name" => "Jhon"
            "last_name" => "Devid"
            "email" => someone@gmail.com
            "active_status" => 1
            ...
            ]
         */
        $users = static::whereNotIn('email', [static::SUPER_ADMIN_EMAIL])
            ->whereNotIn('is_visible', [0])
            ->with('userRole')
            ->get();

        return $users;
    }

    /**
     * Get User Details
     *
     * @param int $userID = 2, primary key of 'users'
     * @return false|User
     */
    public static function userDetails(int $userID)
    {
        /**
         * Get a certain user's information from 'users'
         *
         * @var $user = null| array [
                'id' => 1
                'first_name' => 'Jhon'
                'last_name' => 'Devid'
                'email' => 'example@gmail.com'
                ...
            ]
         */
        $userDetails = static::where('id', $userID)->with('userRole')->first();

        if ($userDetails === null) {
            return false;
        }

        return $userDetails;
    }

    /**
     * User find by email address
     *
     * @param string $email = 'manager@gmail.com'
     * @return mixed
     */
    public static function checUser(string $email)
    {
        return self::where('email', $email)->get();
    }

    /**
     * Create a new user
     *
     * @param array $postData
     * @return bool
     */
    public static function createUser(array $postData)
    {
        // Store new user
        $createdUser = static::create([
            'first_name' => $postData['first_name'],
            'last_name' => $postData['last_name'],
            'email' => $postData['email'],
            'password' => Hash::make($postData['password']),
            'mobile_number' => $postData['mobile_number'],
        ]);

        if ($createdUser) {
            // Assigned role to this user
            $assignedNewRoletoUser = UserRole::assignRole($createdUser->id);

            /**
             * Get user details by created user id. $createdUser->id = 4
             * Fetched a user data from 'users', 'mm_admin_roles', 'mm_admin_user_roles'
             *
             * @var $user = array:10 [▼
                    "id" => 93
                    "first_name" => "Althea"
                    "last_name" => "Heath"
                    "email" => "kywu@mailinator.com"
                    "email_verified_at" => null
                    "note_detail" => null
                    "active_status" => 0
                    "created_at" => "2021-12-27T19:16:31.000000Z"
                    "updated_at" => "2021-12-27T19:40:33.000000Z"
                    "user_role" => array:7 [▶]
                ]
             */
            $user = static::userDetails($createdUser->id);

            return true;
        }

        return false;
    }

    /**
     * Updating the user - 'users' data
     *
     * @param array $postData
     * @param int $id = 2, primary key of 'users'
     * @return bool
     */
    public static function updateUser(array $postData, int $id)
    {
        /**
         * Details of certain user
         *
         * @var User $userDetails = false || array:6 [▼
                "id" => 1
                "first_name" => "Jhon"
                "last_name" => "Devid"
                "email" => someone@gmail.com
                "active_status" => 1
                ...
            ]
         */
        $userDetails = static::find($id);

        if ($userDetails === null) {
            return false;
        }

        $userDetails->first_name = $postData['first_name'];
        $userDetails->last_name = $postData['last_name'];
        $userDetails->email = $postData['email'];
        $userDetails->mobile_number = $postData['mobile_number'];

        if ($postData['password'] !== null) {
            $userDetails->password = Hash::make($postData['password']);
        }

        if (isset($postData['active_status'])) {
            $userDetails->active_status = (int)$postData['active_status'];
        }

        if ($userDetails->save() === true) {
            return true;
        }
    }

    /**
     * Change active_status of specific records of the 'users'.
     *
     * @param int $id = 2, primary key of 'users'
     * @return bool
     */
    public static function changeUserStatus(int $id)
    {
        /**
         * Details of certain user
         *
         * @var User $userDetails = false || array:6 [▼
                "id" => 1
                "first_name" => "Jhon"
                "last_name" => "Devid"
                "email" => someone@gmail.com
                "active_status" => 1
                ...
            ]
         */
        $userDetails = static::userDetails($id);

        if ($userDetails === false) {
            return false;
        }

        // only active_status update of 'users'
        if ($userDetails->active_status === 1) {
            $userDetails->active_status = 0;
            $userDetails->save();
        } elseif ($userDetails->active_status === 0) {
            $userDetails->active_status = 1;
            $userDetails->save();
        }

        return true;
    }

    /**
     * Destroy a user
     *
     * @param int $id
     * @return bool
     */
    public static function deleteUser(int $id)
    {
        /**
         * Details of certain user
         *
         * @var User $userDetails = false || array:6 [▼
                "id" => 1
                "first_name" => "Jhon"
                "last_name" => "Devid"
                "email" => someone@gmail.com
                "active_status" => 1
                ...
            ]
         */
        $userDetails = static::find($id);

        if ($userDetails === null) {
            return false;
        }

        $userDetails->is_visible = 0;
        $userDetails->save();

        return true;
    }
}
