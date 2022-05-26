<?php

class VeranstaltungenFunktionen
{
    public static function ueberpruefeRedner($redner): string
    {
        $regEx = '/^[A-Z][^\d)(\/?=&%$§"!`\'#+*_:,;~<>|\\}\]\[{]{1,}$/u';
        if (preg_match($regEx, $redner))
        {
            throw new Exception('Das ist nicht gültig!');
        }
        else
        {
            return $redner;
        }
    }

    public static function ueberpruefeVName($vName)
    {
        $regEx = '/^[A-Z][^\d)(\/?=&%$§"!`\'#+*_:.,;~<>|\\}\]\[{]{1,}$/u';
        if (preg_match($regEx, $vName))
        {
            throw new Exception('Das ist nicht gültig!');
        }
        else
        {
            return $vName;
        }
    }

    public static function printVeranstaltung($veranstaltungenTag){
        $count = count($veranstaltungenTag);
        for ($i = 0; $i < $count; $i++){
            print($veranstaltungenTag[$i]);
            echo "<br>";
        }
    }
}