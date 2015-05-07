function Login(form) {
	
	var str = $(form).serialize(); 
	$.ajax( { type: "POST", url: "login.php", data: str, success: function(msg){ 
		location.reload();
	}});
	return false; 
}