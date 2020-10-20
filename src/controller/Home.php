<?php
class Home {

    private $title;
    private $model;
    private $messageLogout;
    private $messageLogin;
    private $messageCreate;
    private $logout;
    private $notification;
    

    public function __construct() {
        $this->title = "Home";
        $this->model = new Model();
    }

    public function manage() {
        if (isset($_GET["logout"])) {
            $this->logout = $this->model->logout();
            $this->notification = "Disconnecting success";
        }
        if (isset($_SESSION["pseudo"])) {
            $this->messageLogout = "Logout";
        }
        else {
            $this->messageLogin = "Login";
            $this->messageCreate = "Create a new account";
        }
        include (__DIR__ . './../view/view_home.php');
    }
    
}
?>