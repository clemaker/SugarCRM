<?php
class ModelPlayer {

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

    public function getMyCharacters() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_play = ?');
            $request->execute(array(
                1
            ));
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getMyCharactersAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso');
            $request->execute();
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getMyChaptersAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM chapters');
            $request->execute();
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getMyQuestsAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM quest');
            $request->execute();
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getMyWorldsAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM world');
            $request->execute();
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getMyAttackAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM attack
                                            LEFT JOIN perso ON perso.perso_id = attack_perso
                                            ');
            $request->execute();
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getMyQuests() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM quest WHERE quest_dispo = ?');
            $request->execute(array(
                1
            ));
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getMyWorlds() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM world WHERE world_dispo = ?');
            $request->execute(array(
                1
            ));
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getMyQuest($id) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM quest WHERE quest_id = ?');
            $request->execute(array(
                $id
            ));
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getMyAttack() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM attack 
                                            LEFT JOIN perso ON perso.perso_id = attack_perso
                                            WHERE attack_dispo = ?');
            $request->execute(array(
                1
            ));
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getAllRank() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM rank');
            $request->execute();
            $allRank = $request->fetchAll();
            return $allRank;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getAllType() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM type');
            $request->execute();
            $allType = $request->fetchAll();
            return $allType;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function editedQuest($name, $rank, $pic, $desc, $dispo, $id) {
        try {
            $request = $this->bdd->prepare('UPDATE quest SET quest_name = ?,
                                                            quest_rank = ?,
                                                            quest_pic = ?,
                                                            quest_desc = ?,
                                                            quest_dispo = ?
                                                            WHERE quest_id = ?');
            $request->execute(array(
                $name,
                $rank,
                $pic["name"],
                $desc,
                $dispo,
                $id
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function editAttack($id) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM attack 
                                            LEFT JOIN perso ON perso.perso_id = attack_perso
                                            WHERE attack_id = ?');
            $request->execute(array(
                $id
            ));
            $edit = $request->fetchAll();
            return $edit;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function editedAttack($name, $perso, $pic, $pui, $cost, $dispo, $id) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_name = ?');
            $request->execute(array(
                $perso
            ));
            $all = $request->fetchAll();
            $perso = $all[0]["perso_id"];
            $request = $this->bdd->prepare('UPDATE attack SET attack_name = ?,
                                                            attack_perso = ?,
                                                            attack_img = ?,
                                                            attack_pui = ?,
                                                            attack_use = ?,
                                                            attack_dispo = ?
                                                            WHERE attack_id = ?');
            $request->execute(array(
                $name,
                $perso,
                $pic["name"],
                $pui,
                $cost,
                $dispo,
                $id
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function editQuest($id) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM quest WHERE quest_id = ?');
            $request->execute(array(
                $id
            ));
            $edit = $request->fetchAll();
            return $edit;
        }
        catch (Execption $e) {
            return false;
        }
    }

    public function addNewQuest($name, $rank, $pic, $desc, $dispo) {
        try {
            $request = $this->bdd->prepare('INSERT INTO quest(quest_name, 
                                                            quest_rank,
                                                            quest_pic,
                                                            quest_desc,
                                                            quest_dispo)
                                                            VALUES (?, ?, ?, ?, ?)');
            $request->execute(array(
                $name,
                $rank,
                $pic["name"],
                $desc,
                $dispo
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function getMyChapters() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM chapters WHERE chapter_dispo = ?');
            $request->execute(array(
                1
            ));
            $all = $request->fetchAll();
            return $all;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function editedChapter($name, $pic, $desc, $dispo, $id) {
        try {
            $request = $this->bdd->prepare('UPDATE chapters SET chapter_name = ?,
                                                            chapter_pic = ?,
                                                            chapter_desc = ?,
                                                            chapter_dispo = ?
                                                            WHERE chapter_id = ?');
            $request->execute(array(
                $name,
                $pic["name"],
                $desc,
                $dispo,
                $id
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function editedPlanet($name, $pic, $desc, $dispo, $id) {
        try {
            $request = $this->bdd->prepare('UPDATE world SET world_name = ?,
                                                            world_pic = ?,
                                                            world_desc = ?,
                                                            world_dispo = ?
                                                            WHERE world_id = ?');
            $request->execute(array(
                $name,
                $pic["name"],
                $desc,
                $dispo,
                $id
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function editChapter($id) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM chapters WHERE chapter_id = ?');
            $request->execute(array(
                $id
            ));
            $edit = $request->fetchAll();
            return $edit;
        }
        catch (Execption $e) {
            return false;
        }
    }
    
    public function editPlanet($id) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM world WHERE world_id = ?');
            $request->execute(array(
                $id
            ));
            $edit = $request->fetchAll();
            return $edit;
        }
        catch (Execption $e) {
            return false;
        }
    }

    public function addNewChapter($name, $pic, $desc, $dispo) {
        try {
            $request = $this->bdd->prepare('INSERT INTO chapters(chapter_name,
                                                            chapter_pic,
                                                            chapter_desc,
                                                            chapter_dispo)
                                                            VALUES (?, ?, ?, ?)');
            $request->execute(array(
                $name,
                $pic["name"],
                $desc,
                $dispo
            )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function addNewPlanet($name, $pic, $desc, $dispo) {
        try {
            $request = $this->bdd->prepare('INSERT INTO world(world_name,
                                                            world_pic,
                                                            world_desc,
                                                            world_dispo)
                                                            VALUES (?, ?, ?, ?)');
            $request->execute(array(
                $name,
                $pic["name"],
                $desc,
                $dispo
            )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function deleteChapter($id) {
        try {
            $request = $this->bdd->prepare('DELETE FROM chapters WHERE chapter_id = ?');
            $request->execute(array(
                $id
            ));
            $deleted = $request->fetchAll();
            return $deleted;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function deleteQuest($id) {
        try {
            $request = $this->bdd->prepare('DELETE FROM quest WHERE quest_id = ?');
            $request->execute(array(
                $id
            ));
            $deleted = $request->fetchAll();
            return $deleted;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function deleteWorld($id) {
        try {
            $request = $this->bdd->prepare('DELETE FROM world WHERE world_id = ?');
            $request->execute(array(
                $id
            ));
            $deleted = $request->fetchAll();
            return $deleted;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function deleteAttack($id) {
        try {
            $request = $this->bdd->prepare('DELETE FROM attack WHERE attack_id = ?');
            $request->execute(array(
                $id
            ));
            $deleted = $request->fetchAll();
            return $deleted;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function deletePerso($id) {
        try {
            $request = $this->bdd->prepare('DELETE FROM perso WHERE perso_id = ?');
            $request->execute(array(
                $id
            ));
            $deleted = $request->fetchAll();
            return $deleted;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function editedPerso($name, $type, $pic, $lvl, $pv, $pm, $atk, $def, $vit, $dispo, $id) {
        try { if ($type == "DARK") {
            $typePic = "Dark.png";
            $typeColor = "black";
        }
        elseif ($type == "WATER") {
            $typePic = "Water.png";
            $typeColor = "lightblue";
        }
        elseif ($type == "FIRE") {
            $typePic = "Fire.png";
            $typeColor = "red";
        }
        elseif ($type == "WIND") {
            $typePic = "Wind.png";
            $typeColor = "lightgreen";
        }
        elseif ($type == "EARTH") {
            $typePic = "Earth.png";
            $typeColor = "peru";
        }
        elseif ($type == "LIGHT") {
            $typePic = "Light.png";
            $typeColor = "khaki";
        }
            $request = $this->bdd->prepare('UPDATE perso SET perso_name = ?,
                                                            perso_type = ?,
                                                            perso_typepic,
                                                            perso_color,
                                                            perso_pic = ?,
                                                            perso_lvl = ?,
                                                            perso_pv = ?,
                                                            perso_pm = ?,
                                                            perso_atk = ?,
                                                            perso_def = ?,
                                                            perso_vit = ?,
                                                            perso_play = ?
                                                            WHERE perso_id = ?');
            $request->execute(array(
                $name,
                $type,
                $typePic,
                $typeColor,
                $pic["name"],
                $lvl,
                $pv,
                $pm,
                $atk,
                $def,
                $vit,
                $dispo,
                $id
                )); 
                return true;
                var_dump("perso_id");
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function editPerso($id) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_id = ?');
            $request->execute(array(
                $id
            ));
            $edit = $request->fetchAll();
            return $edit;
        }
        catch (Execption $e) {
            return false;
        }
    }

    public function addNewPerso($name, $type, $pic, $lvl, $pv, $pm, $atk, $def, $vit, $dispo) {
        try {
            if ($type == "DARK") {
                $typePic = "Dark.png";
                $typeColor = "black";
            }
            elseif ($type == "WATER") {
                $typePic = "Water.png";
                $typeColor = "lightblue";
            }
            elseif ($type == "FIRE") {
                $typePic = "Fire.png";
                $typeColor = "red";
            }
            elseif ($type == "WIND") {
                $typePic = "Wind.png";
                $typeColor = "lightgreen";
            }
            elseif ($type == "EARTH") {
                $typePic = "Earth.png";
                $typeColor = "peru";
            }
            elseif ($type == "LIGHT") {
                $typePic = "Light.png";
                $typeColor = "khaki";
            }
            $request = $this->bdd->prepare('INSERT INTO perso(perso_name,
                                                            perso_type, 
                                                            perso_typepic,
                                                            perso_color,
                                                            perso_pic,
                                                            perso_lvl,
                                                            perso_pv,
                                                            perso_pm,
                                                            perso_atk,
                                                            perso_def,
                                                            perso_vit,
                                                            perso_play)
                                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $request->execute(array(
                $name,
                $type,
                $typePic,
                $typeColor,
                $pic["name"],
                $lvl,
                $pv,
                $pm,
                $atk,
                $def,
                $vit,
                $dispo
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function addNewAttack($name, $perso, $pic, $pui, $cost, $dispo) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_name = ?');
            $request->execute(array(
                $perso
            ));
            $all = $request->fetchAll();
            $perso = $all[0]["perso_id"];
            $request = $this->bdd->prepare('INSERT INTO attack(attack_name, 
                                                            attack_perso,
                                                            attack_img,
                                                            attack_pui,
                                                            attack_use,
                                                            attack_dispo)
                                                            VALUES (?, ?, ?, ?, ?, ?)');
            $request->execute(array(
                $name,
                $perso,
                $pic["name"],
                $pui,
                $cost,
                $dispo
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function dispoAttack() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM attack WHERE attack_dispo = ?');
            $request->execute(array(
                1
            ));
            $edit = $request->fetchAll();
            return $edit;
        }
        catch (Execption $e) {
            return false;
        }
    }

}
?>