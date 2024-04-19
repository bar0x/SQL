<?php
header ('Content-Type: image/png');
    //definisco le dimensioni della tela, i margini per il grafico
    $width=800;
    $height=600;
    $mTop=50;
    $mLeft=50;
    $mBottom=50;
    $mRight=150;
    
    //definisco alcunivalori da graficare sull'asse delle y
    $valori = array(5,3,8,4,2,);



$img = imageCreate($width, $height);

    $white = imageColorAllocate($img,255,255,255);
    $black = imageColorAllocate($img,0,0,0);
    $red = imageColorAllocate($img,255,0,0);
    $green = imageColorAllocate($img,0,255,0);
    $blue = imageColorAllocate($img,0,0,255);

    //determino il valore massimo dei valori, in modo da avere un riferimento per la proporzione.
    $maxValore = $valori[0];
    for($i = 0; i <count($valori); i++){
        if ($valori[$i] > $maxValore)
            $maxValore = $valori[$i];
    }

    //determino lo scostamento sull'asse X tra un valore e l'altro.
    $deltaX = ($width-$mLeft-$mRight) / count($valori);
    
    //grafico i valori sottoforma di punti proporzionati alle dimensioni del grafico
    $x = $mLeft //x dei punti
    for($i = 0; $i < count($valori); $i++){
        $y = ($height-$mBottom) - (($height-$mTop-$mLeft)*valori[$i]/$maxValore)
        $x += $deltaX;
    }



    imageRectangle($img, $mLeft, $mTop, ($width-$mRight), ($height-$mBottom), $black);
    imagePNG($img);
?>