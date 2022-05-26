<?php
/**
 * Diese Datei symbolisiert das Hauptprogramm.
 * Hier wird die Uebersicht ueber die Tagungen ausgegeben.
 * @author Audrey Klecha, 334530
 */

/**
 * Funktion zum Schreiben des HTML Headers und Titels
 * @return void
 */
function writeHeaderAndHeadline()
{
    echo "<!DOCTYPE html>
          <html lang=\"de\">
          <head>
            <title>Tagungsprogramm</title>
          </head>";
}
/**
 * Die JSON-Datei kann nicht direkt uebergeben werden,
 * die Daten der Datei muessen erst in einer Variablen gespeichert werden.
 * Danach ist es moeglich die Daten zu decoden und auszugeben.
 */
$jsonDaten = file_get_contents("Veranstaltung.json");
$anfangJson = json_decode($jsonDaten, true);

$tagungsname = $anfangJson['tagungsname'];
$begruessung = $anfangJson['begruessungstext'];
$raumname = $anfangJson['raumname'];
$tag1 = $anfangJson['tag1'];
$tag2 = $anfangJson['tag2'];
$veranstaltungenTag1 = array();
$veranstaltungenTag2 = array();

if(isset($anfangJson['veranstaltungen'])){
    $count = count($anfangJson['veranstaltungen']);
    for ($i = 0; $i < $count; $i++){

        $tag = $anfangJson['veranstaltungen']["$i"]['tag'];
        $uhrzeitStart = $anfangJson['veranstaltungen']["$i"]['uhrzeitstart'];
        $uhrzeitEnde = $anfangJson['veranstaltungen']["$i"]['uhrzeitende'];
        $redner =$anfangJson['veranstaltungen']["$i"]['redner'];
        $vName = $anfangJson['veranstaltungen']["$i"]['vName'] ;
        $veran = $uhrzeitStart . " - " . $uhrzeitEnde . " " . $vName . ", "  . $redner;

        if($tag == "1"){
            array_push($veranstaltungenTag1, $veran);
        }elseif ($tag == "2"){
            array_push($veranstaltungenTag2, $veran);
        }
    }
}
//print_r($anfangJson);

//$redner[] = [];
//$uhrzeiten[] = [];
//$veranstaltungsname[] = [];

/**
 * Anfang des Hauptprogramms
 */
writeHeaderAndHeadline();

echo "<body>";
echo "<h1>  $begruessung  </h1>";
echo "<h1>  $tagungsname  in Emden</h1>";
echo "Die Tagung findet am  $tag1  &  $tag2  im  $raumname  statt. <br><br>";

echo "Veranstaltungen am $tag1 <br>";

$count = count($veranstaltungenTag1);
for ($i = 0; $i < $count; $i++){
    print($veranstaltungenTag1[$i]);
    echo "<br>";
}
echo "<br>";
echo "<a href=\"veranstaltungenEintragen.php/?id=1\">Veranstaltungen für Tag 1 eintragen.</a><br>";
echo "<br>";
echo "<br>";
echo "Veranstaltungen am $tag2 <br>";

$count = count($veranstaltungenTag2);
for ($i = 0; $i < $count; $i++){
    print($veranstaltungenTag2[$i]);
    echo "<br>";
}

echo "<br><a href=\"veranstaltungenEintragen.php/?id=2\">Veranstaltungen für Tag 2 eintragen.</a>";
?>
