<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(){
        $user = getUser(auth()->user()->id);

        return response()->json($user);
    }

    public function update(Request $request)
    {
        try {
            $user = User::find(auth()->user()->id);

            $data = $request->only([
                'name',
                'email',
                'password',
                'role',
                'image'
            ]);

            if($request->email != $user->email){
                $isExistEmail = User::where('email', $request->email)->exists();
                if ($isExistEmail) {
                    return response(['message' => 'Email already taken'], 409);
                }
            }

            if($request->password){
                $data['password'] = bcrypt($request->password);
            }

            if($request->image){
                $image = uploadBase64Image($request->image);
                $data['image'] = $image;
                if($user->image) {
                    Storage::delete('public/'.$user->image);
                }
            }

            $user->update($data);

            return response()->json(['message' => 'User Updated']);
        }
        catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function isEmailExist(Request $request)
    {
        $validator = Validator::make($request->only('email'), [
            'email' => 'required|email'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->messages()], 400);
        }

        $isExist = User::where('email', $request->email)->exists();

        return response()->json(['is_email_exist' => $isExist]);
    }

}
