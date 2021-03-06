<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Models\User;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the 'users'.
     * URL: http://localhost:8000/users
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query = null;
        if(isset($request->q)) {
            $query = $request->q;
        }
        $users = User::search($query)->where('is_visible', 1)->paginate(25);
        return view('pages.users.list', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating and updating a new resource.
     * URL: http://localhost:8000/users/create -create
     * URL: http://localhost:8000/users/create/2 - update
     *
     * @param int|null $id = 2, primary key of 'users'
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(int $id = null)
    {
        $model = null;
        if (! is_null($id)) {
            $model = User::userDetails($id);
        }

        return view('pages.users.create')->with(compact('model'));
    }

    /**
     * Store new user
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
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
            // Store data
            $createdUser = User::createUser($request->all());

            if ($createdUser === true) {
                Session::flash('success', 'Lietot??js ir veiksm??gi izveidojis.');
            } else {
                Session::flash('error', 'Lietot??ju nevar??ja izveidot!');
            }

            // Redirect to grid page
            return redirect()->route('users.grid');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Session::flash('error', 'Kaut kas nog??ja greizi. M????iniet v??l??k v??lreiz.');

            // Redirect to create page
            return redirect()->route('users.create');
        }
    }

    /**
     * Update user
     *
     * @param UserUpdateRequest $request
     * @param $id = 2, primarry key of 'users'
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id)
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
            // Update user
            $updatedUser = User::updateUser($request->all(), $id);

            if ($updatedUser === true) {
                Session::flash('success', 'Lietot??js ir veiksm??gi atjaunin??jis.');
            } else {
                Session::flash('error', 'Lietot??ju nevar??ja atjaunin??t!');
            }

            // Redirect to grid page
            return redirect()->route('users.grid');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Session::flash('error', 'Kaut kas nog??ja greizi. M????iniet v??l??k v??lreiz.');

            // Redirect to create page
            return redirect()->back();
        }
    }

    /**
     * @param $id = 2
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            // Update user
            $deleteUser = User::deleteUser($id);

            if ($deleteUser === true) {
                Session::flash('success', 'Lietot??js to ir veiksm??gi izdz??sis.');
            } else {
                Session::flash('error', 'Lietot??ju nevar??ja izdz??st!');
            }

            // Redirect to grid page
            return redirect()->route('users.grid');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Session::flash('error', 'Kaut kas nog??ja greizi. M????iniet v??l??k v??lreiz.');

            // Redirect to create page
            return redirect()->back();
        }
    }

}
