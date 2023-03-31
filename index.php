<?php

require 'vendor/autoload.php';

use Intervention\Image\Gd\Font;
use Intervention\Image\ImageManagerStatic as Image;


$source = 'public/1649119032.jpg';
$result = 'public/transformedImage.jpg';
$watermark = 'watermark watermark watermark watermark ';

$image = Image::make($source)
    ->resize(200, null, function(\Intervention\Image\Constraint $constraint) {
    $constraint->aspectRatio();
    });

$image->text($watermark, $image->getWidth()-50, $image->getHeight()-50, function(Font $font) {
    $font->size(48);
    $font->color([255, 255, 255, 0.5]);
    $font->align('center');
    
}
);


$image->save($result);

echo $image->response('jpg', 80);
    

?>