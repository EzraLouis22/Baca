<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Melihovv\Base64ImageDecoder\Base64ImageDecoder;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $data = $request->all();


        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()], 400);
        }

        $user = User::where('email', $request->email)->exists();

        if ($user) {
            return response()->json(['message' => 'Email already taken'], 409);
        }

        DB::beginTransaction();

        try {
            $profilePicture = null;

            if ($request->profile_picture) {
                $profilePicture = $this->uploadBase64Image($request->profile_picture);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'profile_picture' => $profilePicture,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message' => $th->getMessage()], 500);
        }

        DB::commit();
        $token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password]);
        $userResponse = getUser($request->email);
        $userResponse->token = $token;
        $userResponse->token_expires_in = auth()->factory()->getTTL() * 60;
        $userResponse->token_type = 'bearer';

        return response()->json($userResponse);

        // $token = $user->createToken('api-token')->plainTextToken;

        // return response()->json([
        //     'token' => $token,
        //     'user' => $user,
        // ]);
    }


    private function uploadBase64Image($base64Image)
    {
        $decoder = new Base64ImageDecoder($base64Image, $allowedFormats = ['jpeg', 'png', 'jpg']);
        $decodedContent = $decoder->getDecodedContent();
        $format = $decoder->getFormat();
        $image = Str::random(10) . '.' . $format;
        Storage::disk('public')->put($image, $decodedContent);

        return $image;
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()], 400);
        }

        try {
            $token = JWTAuth::attempt($credentials);

            if (!$token) {
                return response()->json(['message' => 'Login credentials are invalid']);
            }

            $userResponse = getUser($request->email);
            $userResponse->token = $token;
            $userResponse->token_expires_in = auth()->factory()->getTTL() * 60;
            $userResponse->token_type = 'bearer';

            return response()->json($userResponse);
        } catch (JWTException $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }

        // $user = User::where('email', $request->email)->first();

        // if (!$user) {
        //     throw ValidationException::withMessages([
        //         'email' => ['Email incorrect.'],
        //     ]);
        // }

        // if (!Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'password' => ['Password incorrect.'],
        //     ]);
        // }

        // $token = $user->createToken('api-token')->plainTextToken;

        // return response()->json([
        //     'token' => $token,
        //     'user' => $user,
        // ]);
    }

    public function logout(Request $request)
    {
        auth()->logout(true);

        return response()->json(['message' => 'Log out success']);
    }
}
