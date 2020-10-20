<?php
class Login {

    private $title;
    private $model;
    private $login;
    private $newAccount;
    private $errorMessage;
    private $notification;
    private $message;
    

    public function __construct() {
        $this->title = "Connexion";
        $this->model = new Model();
    }

    public function manage($id) {
        //if (isset($_GET["log"])) {
        if ($id === "log") {
            $this->message = "Log in";
            if (isset($_POST["pseudo"]) AND isset($_POST["password"])) {
                if ($_POST["pseudo"] != "" AND $_POST["password"] != "") {
                    $this->login = $this->model->login($_POST["pseudo"], $_POST["password"]);
                    if ($this->login === true) {
                        $this->notification ="Successful connection";
                    }
                    if ($this->login === 0) {
                        $this->errorMessage ="Error : password is incorect";
                    }
                    if ($this->login === false) {
                        $this->errorMessage = "Unable to join the server, try again later";
                    }
                }
                else {
                    $this->errorMessage ="Please be aware to fill up all areas";
                }
            }
        }
        //if (isset($_GET["add"])) {
            if ($id === "add") {
            $this->message = "Create a new Account";
            if (isset($_POST["pseudo"]) AND isset($_POST["password"])) {
                if ($_POST["pseudo"] != "" AND $_POST["password"] != "") {
                    $this->newAccount = $this->model->addNewAccount($_POST["pseudo"], $_POST["password"]);
                    if ($this->newAccount === true) {
                        $this->notification = "Successful connection";
                    }           
                    if ($this->newAccount === 1) {
                        $this->errorMessage = "Pseudo already is taken";
                    } 
                    if ($this->newAccount === false) {
                        $this->errorMessage = "Unable to join the server, try again later";
                    }
                }
            }
        }
            var_dump($id);
        include (__DIR__ . './../view/view_login.php');
    }
    
}
?>