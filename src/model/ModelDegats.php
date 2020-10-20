<?php
class ModelDegats {

    private $bdd;

    public function __construct() {
        $config = json_decode(file_get_contents(__DIR__ . '/../../config/' . ENV .'/db.json'));

        try {
            $this->bdd = new PDO ($config->dsn, $config->user,$config->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e) {
            var_dump('ERROR : Echec lors de la tentetive de conexion : ' . $e->getMessage());
        }
    }

    public function getPerso($perso) {
        $request = $this->bdd->prepare('SELECT * FROM perso
                                        LEFT JOIN attack ON perso.perso_id = attack.attack_perso
                                        WHERE perso_name = ?');
        $request->execute(array(
            $perso
        ));
        $name = $request->fetchAll();
        return $name;
    }

    public function orderAtk($vit1, $vit2) {
        if ($vit1 > $vit2) {
            return $vit1;
        }
        else {
            return $vit2;
        }
    }

    public function saveXp ($xp, $name) {
        $request = $this->bdd->prepare('UPDATE perso SET perso_xp = ?
                                                        WHERE perso_name = ?');
        $request->execute(array(
            $xp,
            $name
        )); 
        return $xp;
    }

    public function saveLvl ($youLvl, $pv, $pm, $youAtk, $youDef, $youVit, $name) {
        $youLvl = $youLvl + 1;
        $pv = $pv + 5;
        $pm = $pm + 5;
        $youAtk = $youAtk + 2;
        $youDef = $youDef + 2;
        $youVit = $youVit + 2;
        
        $request = $this->bdd->prepare('UPDATE perso SET perso_lvl = ?,
                                                        perso_pv = ?,
                                                        perso_pm = ?,
                                                        perso_atk = ?,
                                                        perso_def = ?,
                                                        perso_vit = ?,
                                                        perso_xp = ?
                                                        WHERE perso_name = ?');
        $request->execute(array(
            $youLvl,
            $pv,
            $pm,
            $youAtk,
            $youDef,
            $youVit,
            0,
            $name
        )); 

        return $youLvl;
    }
    
    public function calculDegat($pv, $pm, $atk, $def, $vit, $advLvl, $fullPv, $advPv, 
                                $advAtk, $advDef, $advVit, $xp, $pui, $puiAdv, $you, $adv) {
        $name = $this->getPerso($you);
        $advType = $this->getPerso($adv);
        $youName = $name[0]["perso_name"];
        $lvl = $name[0]["perso_lvl"];
        $youXp = $name[0]["perso_xp"];
        for ($i = 0; $i < count($name); $i++) {
            if ($name[$i]["attack_id"] == $pui) {
                $pui = $name[$i]["attack_pui"];
                $use = $name[$i]["attack_use"];
            }
        }
        $crit = 1;
        $critAdv = 1;
        if ($advType[0]["perso_type"] == "DARK" AND $name[0]["perso_type"] == "WATER") {
            $critAdv = 2;
            $crit = 0.5;
        }
        elseif ($advType[0]["perso_type"] == "WATER" AND $name[0]["perso_type"] == "FIRE") {
            $critAdv = 2;
            $crit = 0.5;
        }
        elseif ($advType[0]["perso_type"] == "FIRE" AND $name[0]["perso_type"] == "WIND") {
            $critAdv = 2;
            $crit = 0.5;
        }
        elseif ($advType[0]["perso_type"] == "WIND" AND $name[0]["perso_type"] == "EARTH") {
            $critAdv = 2;
            $crit = 0.5;
        }
        elseif ($advType[0]["perso_type"] == "EARTH" AND $name[0]["perso_type"] == "LIGHT") {
            $critAdv = 2;
            $crit = 0.5;
        }
        elseif ($advType[0]["perso_type"] == "LIGHT" AND $name[0]["perso_type"] == "DARK") {
            $critAdv = 2;
            $crit = 0.5;
        }
        $alea = rand(1, 5);
        if ($this->orderAtk($vit, $advVit) == $vit) {
            $advPv = $advPv - ((((($lvl*0.4+2)*$atk*$pui)/($def*50))+2)*$alea*$crit);
            if ($advPv < 1) {
                $youXp = $youXp + $xp;
                if ($this->saveXp($youXp, $youName) > 999) {
                    $this->saveLvl($lvl, $name[0]["perso_pv"], $name[0]["perso_pm"], $name[0]["perso_atk"], 
                                    $name[0]["perso_def"], $name[0]["perso_vit"], $youName);
                }
                return 1;
            }
        }
        $pv = $pv - ((((($advLvl*0.4+2)*$advAtk*$puiAdv)/($def*50))+2)*$alea*$critAdv); 
            if ($pv < 1) {
                return 0;
            }
        if ($this->orderAtk($vit, $advVit) == $advVit) {
            $pv = $pv - ((((($advLvl*0.4+2)*$advAtk*$puiAdv)/($def*50))+2)*$alea*$critAdv);
            if ($pv < 1) {
                return 0;
            }
        }
        $advPv = $advPv - ((((($lvl*0.4+2)*$atk*$pui)/($advDef*50))+2)*$alea*$crit);
        if ($advPv < 1) {
            $youXp = $youXp + $xp;
            if ($this->saveXp($youXp, $youName) > 999) {
                $this->saveLvl($lvl, $name[0]["perso_pv"], $name[0]["perso_pm"], $name[0]["perso_atk"], 
                                    $name[0]["perso_def"], $name[0]["perso_vit"], $youName);
                return 1; 
            }
        }
        $_SESSION["fight"]["pvAdv"] = intval($advPv);
        $_SESSION["fight"]["pvYou"] = intval($pv);
        if ($use != 0) {
            $pm = $pm - $use;
            $_SESSION["fight"]["pmYou"] = intval($pm);
        }
        return 2;
    }

    public function progressBar($pv, $pvYou) {
        if ($pvYou == 0 OR $pvYou < $pv*0.3) {
            $color = "danger";
            return $color;
        }
        elseif ($pvYou >= 0.3*$pv AND $pvYou < 0.7*$pv) {
            $color = "warning";
            return $color;
        }
        elseif ($pvYou >= 0.7*$pv AND $pvYou < 1.1*$pv) {
            $color = "success";
            return $color;
        }
        var_dump($pv);
    }

}
?>