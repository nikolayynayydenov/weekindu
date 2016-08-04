<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests;

class AvatarsController extends Controller
{
    private static $avatarDefaultSize = 400;
    private static $defaultAvatar = 'default.png';
    
    public static function storeImage($image) {
        // store the path to a validated image in the database
        
        if($image && $image->isValid()) {
             // if the user has uploaded an image, store it
            
            $extension = $image->getClientOriginalExtension();
            $avatar = uniqid().'.'.$extension;
            
            $image = Image::make($image);
            $image->fit(self::$avatarDefaultSize)
                ->save(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.
                    'user-avatars'.DIRECTORY_SEPARATOR.$avatar);
            
        } else {
            // if not, return the path to the default avatar
            $avatar = self::$defaultAvatar;
        }     
        return $avatar;
    }
}
