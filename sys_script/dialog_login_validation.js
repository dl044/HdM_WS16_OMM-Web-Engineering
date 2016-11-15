$(function (){
	$('#login-button').click(function(e){
		e.preventDefault();
		
		$( ".error_email" ).empty();
		$( ".error_password" ).empty();
		
		var login_form = document.getElementById("login_form");
		var ajax_data = new FormData(login_form);
			
		ajax_data.append('action', 'user_login');
							
		$.ajax({
			type: 'POST',
			url: 'sys_class/user_management.php',
			data: ajax_data,
			dataType: 'json', 
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){

				if(data.email == 'enter_email'){
					$( ".error_email" ).append('<div class="error_active">Bitte Emailadress angeben!</div>');
				}
				else if(data.email == 'notavailable_email'){
					$( ".error_email" ).append('<div class="error_active">Emailadress nicht vorhanden!</div>');
				}
				else {
					if(data.password == 'enter_password'){
						$( ".error_password" ).append('<div class="error_active">Bitte Passwort angeben!</div>');
					}
					else if(data.password == 'wrong_password'){
						$( ".error_password" ).append('<div class="error_active">Falsches Passwort!</div>');
					}
					else{
						window.location.replace("dashboard.php");	
					}
				}
			}
		});
	});
});	