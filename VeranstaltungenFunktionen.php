<?php

class VeranstaltungenFunktionen
{
    public static function ueberpruefeRedner($redner): string
    {
        $regEx = '/^[A-Z][^\d)(\/?=&%$§"!`\'#+*_:,;~<>|\\}\]\[{]{1,}$/u';
        if (preg_match($regEx, $redner) == 0)
        {
            return "Das ist nicht gültig!";
        }
        else
        {
            return $redner;
        }
    }

    public static function ueberpruefeVName($vName)
    {
        $regEx = '/^[A-Z][^\d)(\/?=&%$§"!`\'#+*_:.,;~<>|\\}\]\[{]{1,}$/u';
        if (preg_match($regEx, $vName) == 0)
        {
            return "Das ist nicht gültig!";
        }
        else
        {
            return $vName;
        }
    }
}