<?php

use App\Models\User;
use App\Models\Renungan;
use Illuminate\Support\Str;
use Melihovv\Base64ImageDecoder\Base64ImageDecoder;
use Illuminate\Support\Facades\Storage;

    function getUser($param){
        $user = User::where('id', $param)
                    ->orWhere('email', $param)
                    ->first();

        $user->profile_picture = $user->profile_picture ? url('storage/'.$user->profile_picture) : "";

        return $user;
    }

    function getRenungan($param){
        $renungan = Renungan::where('id', $param)->first();
        return $renungan;
    }


    function uploadBase64Image($base64Image)
    {
        $decoder = new Base64ImageDecoder($base64Image, $allowedFormats = ['jpeg', 'png', 'jpg']);
        $decodedContent = $decoder->getDecodedContent();
        $format = $decoder->getFormat();
        $image = Str::random(10) . '.' . $format;
        Storage::disk('public')->put($image, $decodedContent);

        return $image;
    }
