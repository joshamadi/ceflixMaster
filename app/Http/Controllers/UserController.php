<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{


    public function all_users(User $user){
        return UserResource::collection($user->latest()->get());
    }

    public function reg_user(Request $request){

        $this->validate($request,[
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        return User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'unique_id' => Uuid::generate()->string,
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
        ]);

    }


    public function check_login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:8'
        ]);

        $user_data = new User();
        $user_data->email = $request->email;
        $user_data->password = $request->password;

        $user_data = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        if (Auth::attempt($user_data))
            return response('User Authenticated', Response::HTTP_OK);
        else
            return response('User Unauthenticated', Response::HTTP_NOT_ACCEPTABLE);
    }


    public function profile()
    {
        return auth('api')->user();
    }



    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();

        $this->validate($request,[
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email,'.$user->id],
            'password' => ['sometimes','required', 'string', 'min:8'],
        ]);

        $currentPhoto = $user->photo;

        if ($request->photo != $currentPhoto){
            $name = time(). '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            Image::make($request->photo)->save(public_path('images/profile/').$name);

            $request->merge(['photo' => $name]);

            $userPhoto = public_path('images/profile/').$currentPhoto;

            if (file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }

        if (!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }


        $user->update($request->all());

        return response('User profile updated', Response::HTTP_OK);
    }
}
