<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class Images
{
    private static $avatarDefaultSize = 400;
    private static $defaultAvatar = 'default.png';
    private static $avatarPath = 'user-avatars';

    private static $eventBackgroundDefaultSize = 1600;
    private static $defaultEventBackground= 'default.png';
    private static $backgoundPath = 'event-backgrounds';

    public static function storeImage($image, $path)
    {
        switch ($path) {
            case self::$avatarPath:
                $defaultSize = self::$avatarDefaultSize;
                $defaultImg = self::$defaultAvatar;
                break;

            case self::$backgoundPath:
                $defaultSize = self::$eventBackgroundDefaultSize;
                $defaultImg = self::$defaultEventBackground;
                break;
            
            default:
                return 'Unknown path: set as second parameter either '.self::$avatarPath.' or '.self::$backgoundPath;
        }
        
        if($image) {
            if($image->isValid()) {
                $extension = $image->getClientOriginalExtension();
                $imageName = uniqid().'.'.$extension;
                $path = 'images/'.$path.'/'.$imageName;
                $image = Image::make($image);
                $image->fit($defaultSize)
                    ->save($path);

                return $imageName;
            } else {
                dd('Invalid image');
            }
        } else {
            return $defaultImg;
        }
    }
}
