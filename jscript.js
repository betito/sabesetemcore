
doc = document;

function trim(sString){
	while (sString.substring(0,1) == ' ')
	{
		sString = sString.substring(1, sString.length);
	}
	while (sString.substring(sString.length-1, sString.length) == ' ')
	{
		sString = sString.substring(0,sString.length-1);
	}
	
	return sString;
} 

function is_same_string(pass1, pass2){
	return pass1 == pass2;
}

function validade_form_fields(){
	
	if (trim(doc.fsignin.email.value) == ""){
		alert (":D Preenche o Email!");
		doc.fsignin.email.focus();
		return false;
	}
	
	if (trim(doc.fsignin.senha.value) == ""){
		alert (":D Preenche o senha!");
		doc.fsignin.senha.focus();
		return false;
	}
	
	if (trim(doc.fsignin.confirmarsenha.value) == ""){
		alert (":D Preenche o confirmar Email!");
		doc.fsignin.confirmarsenha.focus();
		return false;
	}
	
	if (!(is_same_string(doc.fsignin.senha.value, doc.fsignin.confirmarsenha.value))){
		alert (":D Senhas não conferem!");
		doc.fsignin.senha.focus();
		return false;
	}
	
	if (trim(doc.fsignin.cep.value) == ""){
		alert (":D Preenche o CEP!");
		doc.fsignin.cep.focus();
		return false;
	}
	
	if (trim(doc.fsignin.rua.value) == ""){
		alert (":D Preenche a RUA!");
		doc.fsignin.rua.focus();
		return false;
	}
	
	if (trim(doc.fsignin.bairro.value) == ""){
		alert (":D Preenche o BAIRRO!");
		return false;
	}
	
	doc.fsignin.submit();

}
