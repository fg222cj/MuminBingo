<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2016-01-20
 * Time: 10:34
 */
function getTileset()
{
    $tiles[] = "Tekniska problem";
    $tiles[] = "Felstavning i slide";
    $tiles[] = "\"Uhm... uhm... uhm...\"";
    $tiles[] = "Upprepar inte en fråga för distansarna";
    $tiles[] = "\"so, so\"";
    $tiles[] = "Börjar i slutet";
    $tiles[] = "Byter slide av misstag";
    $tiles[] = "Råkar säga något på svenska";
    $tiles[] = "Glömmer spela in föreläsningen";
    $tiles[] = "Random muspekare";
    $tiles[] = "Överfull slide";
    $tiles[] = "\"and, and\"";
    $tiles[] = "\"Ten min brejk\"";
    $tiles[] = "Bug i exempelkod";
    $tiles[] = "\"Mettåd\"";
    $tiles[] = "\"De tåppik får todäj\"";
    $tiles[] = "\"Pråpperti\"";
    $tiles[] = "Upprepar samma ord minst 4 gånger i rad";
    $tiles[] = "\"Åbbjekt\"";
    $tiles[] = "\"Pabblik\"";
    $tiles[] = "\"Åverrajd\"";
    $tiles[] = "Uttalar \"G\" som \"jay\"";
    $tiles[] = "Bokstavssoppa på sliden";
    $tiles[] = "Död muspekare";
    $tiles[] = "Ser förbannad ut";

    shuffle($tiles);
    return $tiles;
}