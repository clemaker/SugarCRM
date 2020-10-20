<?php
class Model {

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

    public function login($pseudo, $password) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM user WHERE user_pseudo = ?');
            $request->execute(array(
            $pseudo
            ));
            $edens = $request->fetch();
            if (password_verify($password, $edens['user_password'])) {
                $this->createSession($pseudo);
                return true;
            }
            else {
                return 0;
            }
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function createSession($pseudo) {
        try {
            $request = $this->bdd->prepare('SELECT user_admin, user_id FROM user WHERE user_pseudo = ?');
            $request->execute(array(
                $pseudo,
            ));
            $edens = $request->fetch();
            $_SESSION["id"] = $edens["user_id"];
            $_SESSION["admin"] = $edens["user_admin"];
            $_SESSION["pseudo"] = $pseudo;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function pseudoUsed($pseudo) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM user WHERE user_pseudo = ?');
            $request->execute(array(
                $pseudo,
            ));
            $edens = $request->fetch();
                if (isset($edens["user_pseudo"])) {
                    return true;
                }
            }
            catch (Exception $e) {
                return false;
            }
    }

    public function addNewAccount($pseudo, $password) {
        try {
            if ($this->pseudoUsed($pseudo) === true) {
                return 1;
            }
            else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $request = $this->bdd->prepare('INSERT INTO user(user_pseudo, 
                                                                user_password)
                                                                VALUES (?, ?)');
                $request->execute(array(
                    $pseudo,
                    $password
                    ));
                $this->createSession($pseudo);
                return true;
            }
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function logout() {
        $_SESSION = array();
        session_destroy();
    }

    public function getAll() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_play = ?');
            $request->execute(array(
                1
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getLvl() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_play = ?  ORDER BY perso_lvl DESC');
            $request->execute(array(
                1
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getPv() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_play = ? ORDER BY perso_pv DESC');
            $request->execute(array(
                1
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getPm() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_play = ? ORDER BY perso_pm DESC');
            $request->execute(array(
                1
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getAtk() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_play = ? ORDER BY perso_atk DESC');
            $request->execute(array(
                1
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getDef() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_play = ? ORDER BY perso_def DESC');
            $request->execute(array(
                1
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getVit() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso WHERE perso_play = ? ORDER BY perso_vit DESC');
            $request->execute(array(
                1
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getAllAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso');
            $request->execute();
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getLvlAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso ORDER BY perso_lvl DESC');
            $request->execute();
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getPvAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso ORDER BY perso_pv DESC');
            $request->execute();
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getPmAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso ORDER BY perso_pm DESC');
            $request->execute();
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getAtkAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso ORDER BY perso_atk DESC');
            $request->execute();
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getDefAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso ORDER BY perso_def DESC');
            $request->execute();
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getVitAdmin() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM perso ORDER BY perso_vit DESC');
            $request->execute();
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

}
?>