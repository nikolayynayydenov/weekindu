<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class Images
{
    private static $avatarDefaultSize = 400;
    private static $defaultAvatar = 'default.png';

    private static $eventBackgroundDefaultSize = 1600;
    private static $defaultEventBackground= 'default.png';

    public static function storeAvatar($image) {
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

    public static function storeEventBackground($image) {
        // store the path to a validated image in the database

        if($image && $image->isValid()) {
            // if the user has uploaded an image, store it

            $extension = $image->getClientOriginalExtension();
            $avatar = uniqid().'.'.$extension;

            $image = Image::make($image);
            $image->fit(self::$eventBackgroundDefaultSize)
                ->save(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.
                    'event-backgrounds'.DIRECTORY_SEPARATOR.$avatar);

        } else {
            // if not, return the path to the default avatar
            $avatar = self::$defaultEventBackground;
        }
        return $avatar;
    }
}
