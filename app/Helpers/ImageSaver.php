<?php

namespace App\Helpers;

class ImageSaver {
    public static function save($file, $filename) {
        $gdimage = imagecreatefromstring($file->get());
        $gdthumb = imagescale($gdimage, 128);
        
        imagejpeg($gdimage, 'img/original/' . $filename, 100);
        imagejpeg($gdthumb, 'img/' . $filename, 75);
        
        imagedestroy($gdimage);
        imagedestroy($gdthumb);
    }
}
