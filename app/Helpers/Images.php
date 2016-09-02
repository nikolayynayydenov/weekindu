<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class Images
{
    public static $default = 'default.png';
    
    public static $avatarDefaultSize = 400;    
    public static $avatarPath = 'user-avatars';

    public static $eventBackgroundDefaultSize = 1600;
    public static $backgoundPath = 'event-backgrounds';

    public static function storeImage($image, $path)
    {
        switch ($path) {
            case self::$avatarPath:
                $defaultSize = self::$avatarDefaultSize;
                break;

            case self::$backgoundPath:
                $defaultSize = self::$eventBackgroundDefaultSize;
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
            return self::$default;
        }
    }

    public static function deleteImage($path, $oldPhotoName)
    {
        $photoExists = file_exists($path);
        if($photoExists && $oldPhotoName != Images::$default) {
            unlink($path);
        }
    }
}
