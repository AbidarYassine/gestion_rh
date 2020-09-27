<?php

namespace App\Services;

use App\BulletinPaie;
use App\Employer;
use App\Societe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BulletinService
{

    public static function getHeurSuppFerier($nbrHeur, $interv, $cout)
    {
        $taux = self::getTaucHeurFerier($interv);
        return $nbrHeur * $cout * $taux;
    }

    public static function getHeurSuppOuvra($nbrHeur, $interv, $cout)
    {
        $taux = self::getTaucHeurOuv($interv);

        return $nbrHeur * $cout * $taux;
    }

    public static function getTaucHeurOuv($interv)
    {
        $taux = 0;
        if ($interv == '6-21') {
            $taux = 1.25;
        } else {
            $taux = 1.50;
        }
        return $taux;
    }

    public static function getTaucHeurFerier($interv)
    {
        $taux = 0;
        if ($interv == '6-21') {
            $taux = 1.5;
        } else {
            $taux = 2;
        }
        return $taux;
    }

    public static function calculAncienter($dateEmbauche, $salaire, $heureSup)
    {
        $durre = self::calculDuree($dateEmbauche);
        $taux = self::getTaux($durre);
        return ($salaire + $heureSup) * $taux / 100;
    }

    public static function calculAnci2($tauxAnciente, $salaireBase, $totalHeurSup)
    {
        return ($salaireBase + $totalHeurSup) * $tauxAnciente / 100;
    }

    public static function calculDuree($dateEmbauche)
    {
        $dateNow = date_create(date('yy/m/d'));
        $dateEmbauche = date_create($dateEmbauche);
        $interval = date_diff($dateNow, $dateEmbauche);
        return $interval->format('%y');
    }

    public static function getTaux($durre)
    {
        $taux = 0;

        if ($durre >= 25) {
            $taux = 25;
        } elseif ($durre >= 20) {
            $taux = 20;
        } elseif ($durre >= 12) {
            $taux = 15;
        } elseif ($durre >= 5) {
            $taux = 10;
        } elseif ($durre >= 2) {
            $taux = 5;
        }
        return $taux;
    }

    public static function CotisCnss($sbi)
    {
        // plafond 268.80
        $idsociete = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        $societe = Societe::find($idsociete);
        $parametre = $societe->parametre;
        $tauxCnss = $parametre->tauxCnss;
        $cotiCnss = $sbi * $tauxCnss / 100;
        if ($cotiCnss > 268.80) {
            $cotiCnss = 268.80;
        }
        return $cotiCnss;
    }

    public static function cotisICmr($tuaxIcmr, $sbi)
    {
        $cotiIcmr = ($sbi) * $tuaxIcmr / 100;
        return $cotiIcmr;
    }

    public static function fraisPersonnlle($sbi, $avantage)
    {
        $friaProfesio = ($sbi - $avantage) * 20 / 100;
        return $friaProfesio;
    }

    public static function getAMO($sbi)
    {
        $idsociete = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        $societe = Societe::find($idsociete);
        $parametre = $societe->parametre;
        $tauxAmo = $parametre->tauxAmo;
        $cotisAmo = $sbi * $tauxAmo / 100;
        return $cotisAmo;
    }
    //     0-2500	0%	0
    // 2501-4166,66 	10%	250 Dh
    // 4166,67-5000 	20%	666,67
    // 5001-6666,666	30%	1166,67
    // 6666,67-15000	34%	1433,33
    // +15000	        38% 2033,33
    public static function gettauxIr($sni)
    {
        $taux = 0;
        $sommeAdeduire = 0;
        $tabVal = [];
        if ($sni >= 15000) {
            $taux = 38;
            $sommeAdeduire = 2033.33;
        } elseif ($sni >= 6666.67) {
            $taux = 34;
            $sommeAdeduire = 1433.33;
        } elseif ($sni >= 5001) {
            $taux = 30;
            $sommeAdeduire = 1166.67;
        } elseif ($sni >= 4166.67) {
            $taux = 20;
            $sommeAdeduire = 666.67;
        } elseif ($sni >= 2501) {
            $taux = 10;
            $sommeAdeduire = 250;
        }
        $tabVal["taux"] = $taux;
        $tabVal["sommeAdeduire"] = $sommeAdeduire;
        return $tabVal;
    }

    public static function getIrBrute($sni)
    {
        $tabVal = self::gettauxIr($sni);
        $irBurte = ($sni * $tabVal["taux"]) / 100 - $tabVal["sommeAdeduire"];
        return $irBurte;
    }

    public static function getChargeFamille($nbr)
    {
        $societe = Societe::where('user_id', Auth::user()->id)->first();
        $parametre = $societe->parametre;
        $chargFamille = $parametre->chargeFamille;
        $charge = $nbr * $chargFamille;
        if ($charge > 180) {
            $charge = 180;
        }
        return $charge;
    }

    public static function getIntervalJo($taux)
    {
        $interval = '';
        switch ($taux) {
            case 25:
                $interval = "6-21";
                break;
            case 50:
                $interval = "21-6";
                break;
        }
        return $interval;
    }

    public static function getIntervalJF($taux)
    {
        $interval = '';
        switch ($taux) {
            case 50:
                $interval = "6-21";
                break;
            case 100:
                $interval = "21-6";
                break;
        }
        return $interval;
    }

    public static function getDataShowApercu($id)
    {
        $bulletinPaie = BulletinPaie::find($id);
        // $sni = $sbi - $cnss - $icmr - $fp - $amo;
        $employer = Employer::find($bulletinPaie->employer_id);
        $heurSup = Db::table('heur_sups')->where('employer_id', $employer->id)
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->whereYear('created_at', date('yy'))->get();
        $totalHeurSup = 0;

        foreach ($heurSup as $heursup) {
            $totalHeurSup += $heursup->nombre_heur;
        }
//        dd($totalHeurSup);
        $cotisation = $bulletinPaie->cotisations;
        $avance = Db::table('avances')->where('employer_id', $employer->id)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('yy'))->first();
        $sniteimp = 0;
        $salireNet = 0;
        foreach ($cotisation as $coti) {
            if ($coti->libelle != 'ir') {
                $sniteimp -= $coti->retenu;
            }
            if ($coti->libelle != 'Frais Professionnel') {
                $salireNet -= $coti->retenu;
            }
        }
        // sni=sbi-element deductible
        $sniteimp = $sniteimp + $bulletinPaie->sbi;
        $sniteimp = $sniteimp - $bulletinPaie->interit;
        $montant = 0;
        if ($avance != null) {
            $montant = $avance->montant;
        }
        $salireNet = $salireNet + $bulletinPaie->sbg - $montant;
        $avantage = $bulletinPaie->avantage;
        $contrat = DB::table('contrats')->where('employer_id', '=', $employer->id)->first();
        $societe=Societe::where('user_id', Auth::user()->id)->first();
        $departement = DB::table('departements')->where('id', $employer->departement_id)->first();
        $post = DB::table('emplois')->where('id', $employer->emploi_id)->first();
        $durreAnciente = BulletinService::calculDuree($contrat->date_embauche);
        $tauxAncienter = BulletinService::getTaux($durreAnciente);
        $Primeancienter = BulletinService::calculAnci2($tauxAncienter, $post->salaire_base, $totalHeurSup);
        $primes = DB::table('primes')->where('employer_id', $employer->id)
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->whereYear('created_at', date('yy'))->get();
        $data = [
            'titre' => 'Fiche de paie',
            'employer' => $employer,
            'cotisation' => $cotisation,
            'totalHeurSup' => $totalHeurSup,
            'heurSup' => $heurSup,
            'contrat' => $contrat,
            'societe' => $societe,
            'departement' => $departement,
            'post' => $post,
            'primes' => $primes,
            'montant' => $montant,
            'avantage' => $avantage,
            'tauxAncienter' => $tauxAncienter,
            'Primeancienter' => $Primeancienter,
            'salire_net_Impo' => $sniteimp,
            'bulletinPaie' => $bulletinPaie,
            'salireNet' => $salireNet,
            'credit' => $bulletinPaie->interit,
        ];
        return $data;
    }
}
