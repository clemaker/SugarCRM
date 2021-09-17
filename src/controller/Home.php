<?php
class Home {

    private $title;
    private $model;
    private $connected = false;
    private $resp;
    private $result;
    private $toto;
    

    public function __construct() {
        $this->title = "Home";
        $this->model = new Model();
    }

    public function manage() {
        if (isset($_POST["pseudo"]) && isset($_POST["password"])) {
            if ("" !== $_POST["pseudo"] && "" !== $_POST["password"]) {
            $url = "https://sg-exercices.demo.sugarcrm.eu/rest/v11_13/oauth2/token?platform=base";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            $headers = array(
               "Accept: application/json",
               "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            
            $data = '{"grant_type":"password","username":"'.$_POST["pseudo"].'",
                "password":"'.$_POST["password"].'","client_id":"sugar",
                "platform":"base","client_secret":"","current_language":"en_us",
                "client_info":{"current_language":"en_us"}}';
            
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            
            $this->resp = curl_exec($curl);
            curl_close($curl);
            $this->connected = true;
            }
        }
        if (isset($_POST["getList"])) {
            $this->getList();
            $this->connected = true;
        }
        if (isset($_POST["getTickets"])) {
            $this->result = $this->getTickets();
            $this->connected = true;
        }
        if (isset($_POST["addTickets"])) {
            $this->addTicket();
            $this->connected = true;
        }
        include (__DIR__ . './../view/view_home.php');
    }

    private function getList() {
        
    }

    private function getTickets() {
        
    }

    private function addTicket() {
        
    }
    
}
?>