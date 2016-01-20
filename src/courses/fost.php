<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2016-01-20
 * Time: 10:31
 */
function getTileset()
{
    $tiles = array();
    $tiles[] = "Tekniska problem";
    $tiles[] = "Felstavning i slide";
    $tiles[] = "\"Ooops\"";
    $tiles[] = "Upprepar inte en fråga för distansarna";
    $tiles[] = "\"Klas\"";
    $tiles[] = "Borde gjort något som han inte gjort";
    $tiles[] = "Byter slide av misstag";
    $tiles[] = "Råkar säga något på svenska";
    $tiles[] = "Glömmer spela in föreläsningen";
    $tiles[] = "Random muspekare";
    $tiles[] = "Överfull slide";
    $tiles[] = "\"Kål\"";
    $tiles[] = "\"Ten min brejk\"";
    $tiles[] = "Bug i exempelkod";
    $tiles[] = "\"Mettåd\"";
    $tiles[] = "\"De tåppik får todäj\"";
    $tiles[] = "\"Pråpperti\"";
    $tiles[] = "\"Stupid\"";
    $tiles[] = "\"Åbbjekt\"";
    $tiles[] = "\"Pabblik\"";
    $tiles[] = "\"Åverrajd\"";
    $tiles[] = "Uttalar \"G\" som \"jay\"";
    $tiles[] = "Bokstavssoppa på sliden";
    $tiles[] = "Berättar att något inte är rocket science";
    $tiles[] = "Bajsar på sig";

    shuffle($tiles);
    return $tiles;
}