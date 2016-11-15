<?php 	
//php und html Tags aus eingabe entfernen
//$user_email = strip_tags($_POST['form_user_email']);
//$user_password = strip_tags($_POST['form_user_password']);

//Session starten
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Startseite</title>
   		<link type="text/css" rel="stylesheet" href="sys_style/grid.css">
   		<link type="text/css" rel="stylesheet" href="sys_style/style.css">
        
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	</head>

	<body>        
		<header>
        	<div class="row">
                <div class="col-xs-6 col-lg-3 col-no-padding">
                    <div class="box">
                    	<img id="header_logo" src="sys_images/logo.png">
                    </div>
                </div>
                <div class="col-xs-0 col-sm-3 col-lg-7">
                    <div class="box"></div>
                </div>
                <div class="col-xs-6 col-sm-3 col-lg-2 col-no-padding">
                    <div class="box">
                    	<a id="header_login" href="javascript:void(0)">
                        	Los geht's
                        	<span>weiter zum Login</span>
                    	</a>
                    </div>
                </div>
            </div>
        </header>
        <main>   
            <section id="teaser">      	       
                <div id="content">
                	<div class="row">
                        <div class="col-xs-0 col-lg-12 ">
                            <div class="box">
                                Blaaaaaaaa
                            </div>
                        </div>
                    </div>
                	<div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="box">
                                <a id="content_registration" class="action_box" href="javascript:void(0)">
                              		<h3>Registrierung</h3>
                                    <h4>Nutzen Sie die Gelegenheit</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-0 col-sm-0 col-md-4">
                            <div class="box">
                            	<a class="action_box" href="javascript:void(0)">
                              		<h3>Mehr</h3>
                                    <h4>Erfahren</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-0 col-sm-6 col-md-4">
                            <div class="box">
                            	<a id="content_invitation" class="action_box" href="javascript:void(0)">
                              		<h3>Einladung</h3>
                                    <h4>Jetzt versenden</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
		</main>
        <div id="dialog_box_wrap">
        	<div id="dialog_overlay"></div>
        	<div id="dialog_box">
            	<a id="dialog_box_close"><img src="sys_images/icon_close.png"></a>
        		<div id="dialog_content"></div>
            </div>
        </div>
        <script src="sys_script/dialog_load_content.js"></script>
    </body>

</html>