<?php

namespace App\Services;

class AvanceService
{


    public static function calculTotalAvane($avances)
    {
        $total = 0;
        foreach ($avances as $avance) {
            $total += $avance->montant;
        }
        return $total;
    }
}
