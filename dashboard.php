<?php 	
//Session starten
session_start();

//Usermanagement einbinden
require_once('sys_class/user_management.php');

//User Objekt erstellen mit der Klasse user_management
$user = new user_management();

//Prüfen ob User angemeldet ist
if($user->user_loggedin()){}
else { header("Location: index.php"); }

//User abmelden
if(isset($_POST['btn-login'])){
	
	//php und html Tags aus eingabe entfernen
	$user->user_logout();
	header("Location: index.php");
}

//User abmelden
if(isset($_POST['btn-login'])){
	
	//php und html Tags aus eingabe entfernen
	$user->user_logout();
	header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
   		<link type="text/css" rel="stylesheet" href="sys_style/dashboard-grid.css">
   		<link type="text/css" rel="stylesheet" href="sys_style/file_accordion.css">
        <link type="text/css" rel="stylesheet" href="sys_style/file_upload.css">
   		<link type="text/css" rel="stylesheet" href="sys_style/dir_structure.css">
   		<link type="text/css" rel="stylesheet" href="sys_style/user_management.css">
        
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	</head>

	<body>
		<header>
        </header>
        <main>
        	<a id="user_management_open">
            	<div id="user_open">
                	<div class="user_open_first"></div>
                    <div class="user_open_second"></div>
                    <div class="clear_both"></div>
                </div>
                <div id="user_avatar">
                	<img src="sys_images/user_avatar.jpg">
                </div>
            </a>   
        	<section id="user_management">
            	<form class="form-logout" method="post" id="logout-form">
            		<button type="submit" name="btn-login" class="">Abmelden</button>
        		</form>
            </section>
            <section id="dir_structure">        	       
                <ul>
                    <li class="no_sub_dir">
                        <a class="dir" href="">
                            <h2>Ordner 1 Level 1</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </a>
                    </li>
                    <li class="no_sub_dir">
                        <a class="dir" href="">
                            <h2>Ordner 2 Level 1</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </a>
                    </li>
                    <li class="no_sub_dir">
                        <a class="dir" href="">
                            <h2>Ordner 3 Level 1</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </a>
                    </li>
                    <li class="sub_dir">
                        <a class="dir" href="javascript:void(0)">
                            <h2>Ordner 4 Level 1 -x</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </a>
                        <div class="scroll_div">
                        <ul>
                            <li class="back_li">
                                <a href="#" class="back-button">&lt; Ordner aufwärts</a>
                            </li>
                            <li class="no_sub_dir">
                                <a class="dir" href="">
                                    <h2>Ordner 1 Level 2</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                                </a>
                            </li>
                            <li class="no_sub_dir">
                                <a class="dir" href="">
                                    <h2>Ordner 2 Level 2</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                                </a>
                            </li>
                            <li class="no_sub_dir">
                                <a class="dir" href="">
                                    <h2>Ordner 3 Level 2</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                                </a>
                            </li>
                            <li class="no_sub_dir">
                                <a class="dir" href="">
                                    <h2>Ordner 4 Level 2</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                                </a>
                            </li>
                            <li class="sub_dir">
                                <a class="dir" href="javascript:void(0)">
                                    <h2>Ordner 5 Level 2 -x</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                                </a>
                                <div class="scroll_div">
                                <ul>
                                    <li class="back_li">
                                        <a href="#" class="back-button">&lt; Ordner aufwärts</a>
                                    </li>
                                    <li class="no_sub_dir">
                                        <a class="dir" href="">
                                            <h2>Ordner 1 Level 3</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                                        </a>
                                    </li>
                                    <li class="no_sub_dir">
                                        <a class="dir" href="">
                                            <h2>Ordner 2 Level 3</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                                        </a>
                                    </li>
                                    <li class="no_sub_dir">
                                        <a class="dir" href="">
                                            <h2>Ordner 3 Level 3</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                                        </a>
                                    </li>
                                </ul>
                                </div>
                            </li>
                        </ul>
                        </div>
                    </li>
                </ul>
            </section>
                
            <section id="file_structure">
            	<div class="file_upload_grid"> 
                    <form class="file_upload" method="post" action="sys_class/file_upload.php" enctype="multipart/form-data">
                      <div class="box_input">
                      	<img class="box_icon" src="">
                        <input class="box_file" type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
                        <label for="file"><strong>Choose a file</strong><span class="box_dragndrop"> or drag it here</span>.</label>
                        <button class="box_button" type="submit"><img class="file_upload_button_icon" src="sys_images/icon_download.png"><span>Upload starten</span></button>
                      </div>
                      <div class="box_uploading">Uploading&hellip;</div>
                      <div class="box_success">Done!</div>
                      <div class="box_error">Error! <span></span>.</div>
                    </form>                    	
                </div> 
                <div class="file_files_grid">
                	<div class="file">
                        <div class="file_data">
                            <img class="file_type" src="sys_images/icon_jpg.png">
                            <div class="file_text">
                                <h2>Dateiname-Platzhalter.jpg</h2>
                                <p>Dateigröße: 250kb</p>
                            </div>
                            <div class="clear_both"></div>
                        </div>
                        <div class="file_action">
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="sys_images/icon_delete.png">
                                <span>löschen</span>
                            </a>
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="sys_images/icon_download.png">
                                <span>download</span>
                            </a>
                            <div class="clear_both"></div>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                    <div class="file">
                        <div class="file_data">
                            <img class="file_type" src="icon_jpg.png">
                            <div class="file_text">
                                <h2>Dateiname-Platzhalter.jpg</h2>
                                <p>Dateigröße: 250kb</p>
                            </div>
                            <div class="clear_both"></div>
                        </div>
                        <div class="file_action">
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_delete.png">
                                <span>löschen</span>
                            </a>
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_download.png">
                                <span>download</span>
                            </a>
                            <div class="clear_both"></div>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                    <div class="file">
                        <div class="file_data">
                            <img class="file_type" src="icon_jpg.png">
                            <div class="file_text">
                                <h2>Dateiname-Platzhalter.jpg</h2>
                                <p>Dateigröße: 250kb</p>
                            </div>
                            <div class="clear_both"></div>
                        </div>
                        <div class="file_action">
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_delete.png">
                                <span>löschen</span>
                            </a>
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_download.png">
                                <span>download</span>
                            </a>
                            <div class="clear_both"></div>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                    <div class="file">
                        <div class="file_data">
                            <img class="file_type" src="icon_jpg.png">
                            <div class="file_text">
                                <h2>Dateiname-Platzhalter.jpg</h2>
                                <p>Dateigröße: 250kb</p>
                            </div>
                            <div class="clear_both"></div>
                        </div>
                        <div class="file_action">
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_delete.png">
                                <span>löschen</span>
                            </a>
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_download.png">
                                <span>download</span>
                            </a>
                            <div class="clear_both"></div>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                    <div class="file">
                        <div class="file_data">
                            <img class="file_type" src="icon_jpg.png">
                            <div class="file_text">
                                <h2>Dateiname-Platzhalter.jpg</h2>
                                <p>Dateigröße: 250kb</p>
                            </div>
                            <div class="clear_both"></div>
                        </div>
                        <div class="file_action">
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_delete.png">
                                <span>löschen</span>
                            </a>
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_download.png">
                                <span>download</span>
                            </a>
                            <div class="clear_both"></div>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                    <div class="file">
                        <div class="file_data">
                            <img class="file_type" src="icon_jpg.png">
                            <div class="file_text">
                                <h2>Dateiname-Platzhalter.jpg</h2>
                                <p>Dateigröße: 250kb</p>
                            </div>
                            <div class="clear_both"></div>
                        </div>
                        <div class="file_action">
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_delete.png">
                                <span>löschen</span>
                            </a>
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_download.png">
                                <span>download</span>
                            </a>
                            <div class="clear_both"></div>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                    <div class="file">
                        <div class="file_data">
                            <img class="file_type" src="icon_jpg.png">
                            <div class="file_text">
                                <h2>Dateiname-Platzhalter.jpg</h2>
                                <p>Dateigröße: 250kb</p>
                            </div>
                            <div class="clear_both"></div>
                        </div>
                        <div class="file_action">
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_delete.png">
                                <span>löschen</span>
                            </a>
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_download.png">
                                <span>download</span>
                            </a>
                            <div class="clear_both"></div>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                    <div class="file">
                        <div class="file_data">
                            <img class="file_type" src="icon_jpg.png">
                            <div class="file_text">
                                <h2>Dateiname-Platzhalter.jpg</h2>
                                <p>Dateigröße: 250kb</p>
                            </div>
                            <div class="clear_both"></div>
                        </div>
                        <div class="file_action">
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_delete.png">
                                <span>löschen</span>
                            </a>
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_download.png">
                                <span>download</span>
                            </a>
                            <div class="clear_both"></div>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                    <div class="file">
                        <div class="file_data">
                            <img class="file_type" src="icon_jpg.png">
                            <div class="file_text">
                                <h2>Dateiname-Platzhalter.jpg</h2>
                                <p>Dateigröße: 250kb</p>
                            </div>
                            <div class="clear_both"></div>
                        </div>
                        <div class="file_action">
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_delete.png">
                                <span>löschen</span>
                            </a>
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_download.png">
                                <span>download</span>
                            </a>
                            <div class="clear_both"></div>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                    <div class="file">
                        <div class="file_data">
                            <img class="file_type" src="icon_jpg.png">
                            <div class="file_text">
                                <h2>Dateiname-Platzhalter.jpg</h2>
                                <p>Dateigröße: 250kb</p>
                            </div>
                            <div class="clear_both"></div>
                        </div>
                        <div class="file_action">
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_delete.png">
                                <span>löschen</span>
                            </a>
                            <a class="file_action_button">
                                <img class="file_action_button_icon" src="icon_download.png">
                                <span>download</span>
                            </a>
                            <div class="clear_both"></div>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </div>                   
            </section>
		</main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="sys_script/dir_structure.js"></script>
        <script src="sys_script/user_management.js"></script>
        <script src="sys_script/file_accordion.js"></script>
        <script src="sys_script/file_upload.js"></script>
    </body>

</html>