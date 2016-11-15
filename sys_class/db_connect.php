<?php
class database {
	
    private $db_server = "mars.iuk.hdm-stuttgart.de";
    private $db_name = "u-dl044";
    private $db_username = "dl044";
    private $db_password = "Pah7AeyieJ";
    public $db_connect;
     
    public function get_db(){
     
	    $this->db_connect = null;    
		$this->db_connect = new PDO("mysql:dbhost=" . $this->db_server . ";dbname=" . $this->db_name, $this->db_username, $this->db_password);
		 
        return $this->db_connect;
    }
}
?>