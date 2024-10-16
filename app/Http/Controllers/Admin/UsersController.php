<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function userList()
    {
        $data['userRoles'] = UserRole::getUserRoles();
        $data['adminList'] = User::where('is_super_admin',0)->get();
    // Debugging statement
        return view('admin.user.list', $data);
    }

    public function changeStatus(Request $request)
    {

            try {
                $userId = $request->input('userid'); // Assuming the parameter is named 'user_id'
                $newStatus = $request->input('status'); // Assuming the parameter is named 'new_status'

                // Find the user by ID
                $user = User::find($userId);

                if ($user) {
                    // Update the user's status
                    $user->is_active = $newStatus;
                    $user->save();
                    if($request->input('status')==1)
                    {
                        $data="activate";
                    }
                    else
                    {
                        $data="deactivate";
                    }
                    $response = ['status' => 200, 'msg' => 'Status updated successfully', 'data' => $data];
                } else {
                    $response = ['status' => 404, 'msg' => 'User not found', 'data' => null];
                }

                return json_encode($response);
            } catch (\Exception $e) {
                // Handle the exception
                $response = ['status' => 500, 'msg' => 'Something went wrong', 'data' => $e->getMessage()];
                return json_encode($response);
            }


    }


    public function deleteUser(Request $request)
    {

            try {
                $userId = $request->input('userid'); // Assuming the parameter is named 'user_id'
           // Assuming the parameter is named 'new_status'

                // Find the user by ID
                $user = User::find($userId);

                if ($user) {
                    // Update the user's status
                    $user->is_deleted = 1;
                    $user->is_active = 0;
                    $user->save();

                    $response = ['status' => 200, 'msg' => 'User deteted successfully', 'data' => []];
                } else {
                    $response = ['status' => 404, 'msg' => 'User not found', 'data' => null];
                }

                return json_encode($response);
            } catch (\Exception $e) {
                // Handle the exception
                $response = ['status' => 500, 'msg' => 'Something went wrong', 'data' => $e->getMessage()];
                return json_encode($response);
            }


    }



// Example
public function userSave(Request $request)
{
    try {
        // Code that might throw an exception
        if ($request->user_id == 0) {
            // Creating a new user
            $user = new User();
            $user->fname = $request->firstname;
            $user->lname = $request->lastname;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->phone = $request->phoneno;
            $user->role_id = $request->role;
            $user->is_active = $request->is_active;
            $user->password = Hash::make(trim($request->confirmPassword));
            $user->save();
            $newUserId = $user->id;

            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $storagePath = "admin/users/{$newUserId}";

                // Ensure the subdirectories exist, or create them if not
                Storage::disk('storage')->makeDirectory($storagePath);

                Storage::disk('storage')->putFileAs($storagePath, $file, $filename);

                $imgData['avatar'] = $storagePath.'/'.$filename;

                User::where('id', $newUserId)->update($imgData);
            }

            $response = ['status' => 200, 'msg' => 'Successfully added user', 'data' => "Success"];
        } elseif ($request->user_id > 0) {
            // Updating an existing user
            $userId = $request->user_id;
            $userupdate = User::find($userId);

            if ($userupdate) {
                $userupdate->fname = $request->firstname;
                $userupdate->lname = $request->lastname;
                $userupdate->gender = $request->gender;
                $userupdate->email = $request->email;
                $userupdate->phone = $request->phoneno;
                $userupdate->role_id = $request->role;
                $userupdate->is_active = $request->is_active;

                if ($request->filled('confirmPassword')) {
                    $userupdate->password = Hash::make(trim($request->confirmPassword));
                }

                $userupdate->save();
                if ($request->hasFile('profile_picture')) {
                    $file = $request->file('profile_picture');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $storagePath = "admin/users/{$userId}";

                    // Ensure the subdirectories exist, or create them if not
                    Storage::disk('storage')->makeDirectory($storagePath);

                    Storage::disk('storage')->putFileAs($storagePath, $file, $filename);

                    $imgData['avatar'] = $storagePath.'/'.$filename;

                    User::where('id', $userId)->update($imgData);
                }

                $response = ['status' => 200, 'msg' => 'Successfully updated user', 'data' => "Success"];
            } else {
                $response = ['status' => 404, 'msg' => 'User not found', 'data' => null];
            }

            // Debugging statement
            \Log::info("Updating existing user! User ID: $userId");
        }

        return json_encode($response);
    } catch (\Exception $e) {
        // Handle the exception
        $response = ['status' => 500, 'msg' => "Duplicate Field entry", 'data' => $e->getMessage()];
        return json_encode($response);
    }
}




}
