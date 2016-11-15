<?php
//Session starten
session_start();

// Datenbank Connection einbinden
require_once('db_connect.php');

// Ajax Controller ausführen
$controller = new user_management();


if ( isset( $_POST["action"] )) {
  $action = $_POST["action"];
  $controller->$action();
}

class user_management {	

	// Variable für Datenbankverbindung
	private $db_connect;
	
//--Datenbankverbindung aufbauen im Konstruktor -
//-----------------------------------------------
	public function __construct(){
		
		// Neues Objekt mit Datenbankverbindung
		$database = new database();
		$db = $database->get_db();
		$this->db_connect = $db;
	}
	
//--SQL Befehl ausführen ------------------------
//-----------------------------------------------
//	public function runQuery($sql){
		
		// SQL Befehl Vorbereiten -> prepare
//		$stmt = $this->db_connect->prepare($sql);
		
//		return $stmt;
//	}
	
//--Logout ausführen ----------------------------
//-----------------------------------------------	
	public function user_logout(){
		
		//Session Variablen löschen
		session_unset();
		
		//Session beenden
		session_destroy();
		
		return true;
	}

//--Login prüfen --------------------------------
//-----------------------------------------------	
	public function user_loggedin(){
		
		// Wenn Session-Variable nicht vorhanden ist zu index.php weiterleiten
		if(!isset($_SESSION['user_session'])){ 
			$correct = array('isValid' => false);
			if ( isset( $_POST["action"] )) {
				echo json_encode($correct);
			}
			return false;
		}else {
			$correct = array('isValid' => true);
			if ( isset( $_POST["action"] )) {
				echo json_encode($correct);
			}
			return true;
		}
	}
	
//--Login ausführen -----------------------------
//-----------------------------------------------	
	public function user_login(){
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["form_user_email"])) {
				$validation_login = array('email' => 'enter_email');
				//$validation = array('email' => $_POST["form_user_email"]);
  				echo json_encode($validation_login);
			}
			else {
				
				//Datenbankeintrag vorebreiten
				$stmt = $this->db_connect->prepare("SELECT user_email FROM tbl_users WHERE user_email=:user_email ");
			
				// Variablen in SQL-Befehl ersetzen										  
				$stmt->bindparam(':user_email', $_POST["form_user_email"]);
				
				//Datenbankeintrag ausführen		
				$stmt->execute();			
			
				//Objekt mit Daten aus Datenbank erstellen
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
												
				if ($stmt->rowCount() != 1){ 
					$validation_login = array('email' => 'notavailable_email');
					echo json_encode($validation_login);
				} 
				else {
					
					$validation_login = array('email' => 'available_email');
					
					if (empty($_POST["form_user_password"])) {
    					$validation_login['password'] = 'enter_password';
						echo json_encode($validation_login);
  					}
					else {
					
						//Datenbankeintrag vorebreiten
						$stmt = $this->db_connect->prepare("SELECT user_id, user_password FROM tbl_users WHERE user_email=:user_email ");
			
						// Variablen in SQL-Befehl ersetzen										  
						$stmt->bindparam(':user_email', $_POST["form_user_email"]);
				
						//Datenbankeintrag ausführen		
						$stmt->execute();			
			
						//Objekt mit Daten aus Datenbank erstellen
						$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				
						//Passwort prüfen
						$pw_decription = password_verify($_POST["form_user_password"], $userRow['user_password']);
				
						if ($pw_decription){
							
							//Session-Variable setzen
							$_SESSION['user_session'] = $userRow['user_id'];
							$_SESSION['user_id'] = $userRow['user_id'];
							
							$validation_login['password'] = 'right_password';
							echo json_encode($validation_login);
							$validation_login = array();
						}
 
						else {
							$validation_login['password'] = 'wrong_password';
							echo json_encode($validation_login);
						}
					}
				}
			}	
		}
	}
	
//--Registrierung -------------------------------
//-----------------------------------------------
	public function user_registration(){
		
		$validation = array();
		
		if (empty($_POST["form_user_name"])) {
    		$validation['username'] = 'enter_username';
  		}
		
		
		if (empty($_POST["form_user_password"])) {
    		$validation['password'] = 'enter_password';
  		}
		elseif (empty($_POST["form_user_password_repeat"])) {
    		$validation['password'] = 'enter_password';
  		}		
		elseif (strlen($_POST["form_user_password"]) <= '8') {
            $validation['password'] = 'length_password';
        }
		elseif($_POST["form_user_password"] == $_POST["form_user_password_repeat"]){
			//Password verschlüsseln
			$user_password_hash = password_hash($_POST["form_user_password"], PASSWORD_DEFAULT);
		}
		else {
			$validation['password'] = 'different_password';
		}
		
		
		//Datenbankeintrag vorebreiten
		$stmt = $this->db_connect->prepare("SELECT user_email FROM tbl_users WHERE user_email=:user_email");
	
		// Variablen in SQL-Befehl ersetzen										  
		$stmt->bindparam(':user_email', $_POST["form_user_email"]);
		
		//Datenbankeintrag ausführen		
		$stmt->execute();
		
		if (empty($_POST["form_user_email"])) {
    		$validation['email'] = 'enter_email';
  		}
		elseif (!filter_var($_POST["form_user_email"], FILTER_VALIDATE_EMAIL)){
			$validation['email'] = 'no_email';
		}
		elseif ($stmt->rowCount() != 0){
			$validation['email'] = 'existing_email';
		}
		
		
		$acceptable = array('image/jpg', 'image/png');
		if(empty($_FILES["form_user_avatar"]["name"])){
			$validation['avatar'] = 'enter_avatar';
		}
		elseif(!in_array($_FILES['form_user_avatar']['type'], $acceptable)) {
			$validation['avatar'] = 'type_avatar';
		}
		elseif(($_FILES['form_user_avatar']['size'] >= 2000000) || ($_FILES["form_user_avatar"]["size"] == 0)) {
			$validation['avatar'] = 'size_avatar';
		}
		

				
		if(empty($validation)) {
			//Datenbankeintrag vorebreiten
			$stmt = $this->db_connect->prepare("INSERT INTO tbl_users(user_name, user_email, user_password) VALUES(:user_name, :user_email, :user_password)");
			// Variablen in SQL-Befehl ersetzen										  
			$stmt->bindparam(':user_name', $_POST["form_user_name"]);
			$stmt->bindparam(':user_email', $_POST["form_user_email"]);
			$stmt->bindparam(':user_password', $user_password_hash);
			//Datenbankeintrag ausführen		
			$stmt->execute();
			
			
			$stmt = $this->db_connect->prepare("SELECT user_id FROM tbl_users WHERE user_email=:user_email");
			// Variablen in SQL-Befehl ersetzen										  
			$stmt->bindparam(':user_email', $_POST["form_user_email"]);						  		
			//Datenbankeintrag ausführen		
			$stmt->execute();
			//Objekt mit Daten aus Datenbank erstellen
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			
			move_uploaded_file($_FILES['form_user_avatar']['tmp_name'], '/home/dl044/public_html/final/file_storage/user_data/'.$userRow['user_id'].'_'.$_FILES['form_user_avatar']['name']);
			
			
			//Datenbankeintrag vorebreiten		
			$stmt = $this->db_connect->prepare("UPDATE tbl_users SET user_avatar=:user_avatar WHERE user_email=:user_email");
			// Variablen in SQL-Befehl ersetzen				
			$stmt->bindparam(':user_email', $_POST["form_user_email"]);						  
			$avatar_path = '/home/dl044/public_html/final/file_storage/user_data/'.$userRow['user_id'].'_'.$_FILES['form_user_avatar']['name'];									
			$stmt->bindparam(':user_avatar', $avatar_path);										  		
			//Datenbankeintrag ausführen		
			$stmt->execute();
						
			//------Neu registrierter User anmelden
			//Datenbankeintrag vorebreiten
			$stmt = $this->db_connect->prepare("SELECT user_id, user_email, user_password FROM tbl_users WHERE user_email=:user_email ");
				
			// Variablen in SQL-Befehl ersetzen										  
			$stmt->bindparam(':user_email', $_POST["form_user_email"]);
					
			//Datenbankeintrag ausführen		
			$stmt->execute();			
				
			//Objekt mit Daten aus Datenbank erstellen
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
						
			//Session-Variable setzen
			$_SESSION['user_session'] = $userRow['user_id'];
			$_SESSION['user_id'] = $userRow['user_id'];
			
			$validation['registration'] = 'done';
			
		}

		echo json_encode($validation);	
		$validation = array();

	}
	
}
?>