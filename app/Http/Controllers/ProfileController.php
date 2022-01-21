<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

/**
 * Class ProfileController
 * @package  App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        /**
         * Details of logged user
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
        $userDetails = User::userDetails(auth()->user()->id);

        return view('pages.users.profile', [
            'userDetails' => $userDetails
        ]);
    }

    /**
     * * Update the logged user resource in storage.
     *
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request)
    {
        /**
         * The incoming request is valid here
         * Retrieve the validated input data
         *
         * @var $validated = [
                "first_name" => "manager"
                "last_name" => "manager"
                "email" => "someone@gmail.com"
                "password" => "1111"
                "confirm_password" => "1111"
            ]
         */
        $validated = $request->validated();

        try {
            // Update profile
            $updatedUser = User::updateUser($request->all(), auth()->user()->id);

            if ($updatedUser === true) {
                Session::flash('success', 'Your profile has been updated successfully.');
            } else {
                Session::flash('error', 'Your profile hasn\'t updated yet!');
            }

            // Redirect to same
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Session::flash('error', 'Something went wrong. Try later again.');

            // Redirect to same
            return redirect()->back();
        }
    }
}
