$(function (){
	$('#registration_button').click(function(e){
		e.preventDefault();
		
		$( ".error_username" ).empty();
		$( ".error_email" ).empty();
		$( ".error_password" ).empty();
		$( ".error_password_repeat" ).empty();
		$( ".error_avatar" ).empty();
		
		var registration_form = document.getElementById("registration_form");
		var ajax_data = new FormData(registration_form);
			
		ajax_data.append('action', 'user_registration');
							
		$.ajax({
			type: 'POST',
			url: 'sys_class/user_management.php',
			data: ajax_data,
			dataType: 'json', 
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){

				if(data.username == 'enter_username'){
					$(".error_username").append('<div class="error_active">Bitte Username angeben!</div>');
				}

				if(data.password == 'enter_password'){
					$(".error_password").append('<div class="error_active">Bitte Password angeben!</div>');
					$(".error_password_repeat").append('<div class="error_active">Bitte Password angeben!</div>');
				}
				else if(data.password == 'length_password'){
					$( ".error_password" ).append('<div class="error_active">Passwort muss mindestens 9 Zeichen lang sein!</div>');
					$( ".error_password_repeat" ).append('<div class="error_active">Passwort muss mindestens 9 Zeichen lang sein!</div>');
				}
				else if(data.password == 'different_password'){
					$( ".error_password" ).append('<div class="error_active">Passwort stimmt nicht überein!</div>');
					$( ".error_password_repeat" ).append('<div class="error_active">Passwort stimmt nicht überein!</div>');
				}

				if(data.email == 'enter_email'){
					$(".error_email").append('<div class="error_active">Bitte Emailadresse angeben!</div>');
				}
				else if(data.email == 'no_email'){
					$(".error_email").append('<div class="error_active">Bitte gültige Emailadresse angeben!</div>');
				}
				else if(data.email == 'existing_email'){
					$(".error_email").append('<div class="error_active">Emailadresse existiert bereits!</div>');
				}
				
				if(data.avatar == 'enter_avatar'){
					$(".error_avatar").append('<div class="error_active">Bitte Profilbild auswählen!</div>');
				}
				else if(data.avatar == 'type_avatar'){
					$(".error_avatar").append('<div class="error_active">Nur Dateityp: .jpg/.png erlaubt!</div>');
				}
				else if(data.avatar == 'size_avatar'){
					$(".error_avatar").append('<div class="error_active">Datei zu groß, maximal 2MB!</div>');
				}
				
				if(data.registration == 'done'){
					window.location.replace("dashboard.php");
				}
			}
		});
	});
});	