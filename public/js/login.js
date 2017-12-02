function validateFormLogin(){
	if (!(checkUsername() && checkPassword()) )  {
		message.innerHTML  = 'invalid username / invalid password';
		return false;
	}
	return true;
}
function checkUsername() {
 	return ( /^[A-Za-z0-9_\.]{8,32}$/.test(username.value));
}
function checkPassword() {
	return(/^([A-Z]){1}([\w_\.!@#$%^&*()]+){8,31}$/.test(password.value));
}
