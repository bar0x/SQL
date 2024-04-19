<?php
header ('Content-Type: image/png');
    $img = imageCreate(800, 600);

    $white = imageColorAllocate($img,255,255,255);
    $black = imageColorAllocate($img,0,0,0);
    $red = imageColorAllocate($img,255,0,0);
    $green = imageColorAllocate($img,0,255,0);
    $blue = imageColorAllocate($img,0,0,255);

    imageLine($img, 100, 100, 100, 500, $blue);
    imageLine($img, 100, 500, 700, 500, $blue);
    imagePNG($img);
?>