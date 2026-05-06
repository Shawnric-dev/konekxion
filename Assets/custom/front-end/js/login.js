// let gbl_rootUrl = 'http://127.0.0.1/production/Educator/Assets/custom/back-end';
// let gbl_rootUrl = 'http://69.10.54.139/edu/Educator/Assets/custom/back-end';

let gbl_rootUrl = 'Assets/custom/back-end';

let lbl_error = $('#lbl_login_error');
let txt_user = $('#txt_user');
let txt_pass = $('#txt_pass');

let txt_user_ = $('#txt_user_');
let btn_login_ = $('#btn_login_');

$('#login_form').on('submit', function(e){

	e.preventDefault();

	let user = txt_user.val();
	let pass = txt_pass.val();
	let formData = `user=${user}&&pass=${pass}`;

	let url=gbl_rootUrl+'/v1/user/login.php';

	$.post(url, formData, function(data, status){

		let dataObj = JSON.parse(data);
		let resData = dataObj['res'];

		if(resData!=null){
			if(resData['state']==1){
				txt_user_.val(user);
				btn_login_.click();
			}
			else if(resData['user_state']==-1) lbl_error.text('Usuário disativado');
		}
		else { // Palavra-passe
			lbl_error.text('Senha incorreta');
			txt_pass.val('');
		}
	});
});

txt_user.on('focus',function(){
	lbl_error.text('');
});

txt_pass.on('focus',function(){
	lbl_error.text('');
});