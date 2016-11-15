$('#dialog_box_close').click(function(){
	$("#dialog_box_wrap").removeClass("show_dialog");
	setTimeout(function() {
		$("#dialog_content").empty();  
	}, 600);
});

$('#dialog_overlay').click(function(){
	$("#dialog_box_wrap").removeClass("show_dialog");
	setTimeout(function() {
		$("#dialog_content").empty();  
	}, 600);
});

$('#header_login').click(function(){
	$.ajax({
		type: 'POST',
		url: 'sys_class/user_management.php',
		data: 'action=user_loggedin',
		dataType: 'json', 
		success: function(data){
			//alert(data.isValid)
			if(data.isValid == true ){
			   window.location.replace("dashboard.php");
			} else {								
				$("#dialog_content").load("sys_dialog/dialog_login.html");
				$("#dialog_box_wrap").addClass("show_dialog");
			};
		}
	});
});

$('#content_registration').click(function(){
	$("#dialog_content").load("sys_dialog/dialog_registration.html");
	$("#dialog_box_wrap").addClass("show_dialog");
});

$('#content_invitation').click(function(){
	$("#dialog_content").load("sys_dialog/dialog_invitation.html");
	$("#dialog_box_wrap").addClass("show_dialog");
});