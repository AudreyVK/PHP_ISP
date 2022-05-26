<?php
require 'Veranstaltungen.php';
require_once 'VeranstaltungenFunktionen.php';

$tag =  $_GET["id"];
echo "<h1> Formular zum Eintragen der Veranstaltungen am " . $tag . "</h1>";
echo "<form action='' method='POST'>";
echo "<label for='Uhrzeitstart'>Uhrzeit-Start</label>  
      <input type='time' name='uhrzeitstart' id='Uhrzeit'> <br>";
echo "<label for='Uhrzeitende'>Uhrzeit-Ende</label>  
      <input type='time' name='uhrzeitende' id='Uhrzeit'> <br>";
echo "<label for='Veranstaltungsname'>Veranstaltungsname</label>
      <input type='text' name='vName' id='Veranstaltungsname' required> <br>";
echo "<label for='VeranstaltungenFunktionen'>VeranstaltungenFunktionen</label>
      <input type='text' name='redner' id='VeranstaltungenFunktionen'> <br><br>";
echo "<input type='submit' value='Veranstaltung eintragen'> <br>";


if(isset($_POST['vName'])) {
    $uhrzeitStart = $_POST["uhrzeitstart"];
    $uhrzeitEnde = $_POST["uhrzeitende"];
    $vName = $_POST["vName"];
    $redner = $_POST["redner"];
    
    $vNameChecked = VeranstaltungenFunktionen::ueberpruefeVName($vName);
    $rednerChecked = VeranstaltungenFunktionen::ueberpruefeRedner($redner);
    
    /*if ($rednerChecked === $redner && $vNameChecked === $vName)
    {*/
        $jsonDaten = file_get_contents("Veranstaltung.json");
        $anfangJson = json_decode($jsonDaten, true);
        $veranstaltung = new Veranstaltungen("$vName");
        $veranstaltung->setTag("$tag");
        $veranstaltung->setZeit("$uhrzeitStart","$uhrzeitEnde");
        $veranstaltung->setRedner("$redner");
        
        $count = count($anfangJson['veranstaltungen']);
        $anfangJson['veranstaltungen'][$count] = $veranstaltung;
        $jsonVeranstaltung = json_encode($anfangJson);

        fopen("Veranstaltung.json", "w+");
        file_put_contents("Veranstaltung.json", $jsonVeranstaltung, FILE_APPEND);

        
    //}
}
echo "<br><br> <a href='../IndexEA3.php'>Zurück zur Startseite</a>";
?>
