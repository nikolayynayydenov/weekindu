<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AvatarsController extends Controller
{
    public static function storeImage($image) {
        // store the path to a validated image in the database
        if($image) {
             // if the user has uploaded an image, store it
            
            $extension = $image->getClientOriginalExtension();
            $avatar = str_random(10).'.'.$extension;
            
            $image->move(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.
                    'user-avatars', $avatar);
            echo 'true;';
            
        } else {
            // if not, return the path to the default avatar
            echo 'false';
            $avatar = 'default.jpg';
        }     
        return $avatar;
    }
}
