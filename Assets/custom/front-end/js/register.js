let gbl_rootUrl = 'Assets/custom/back-end';

// ___ Accessing DOM elements ____
let txt_user_full_name = $('#txt_user_full_name');
let txt_user_name = $('#txt_user_name');
let txt_user_pass = $('#txt_user_pass');
let txt_user_pass2 = $('#txt_user_pass2');
let txt_user_email = $('#txt_user_email');
let txt_user_contact = $('#txt_user_contact');

let txt_clinic_name = $('#txt_clinic_name');
let txt_clinic_slogan = $('#txt_clinic_slogan');

let txt_clinic_address = $('#txt_clinic_address');
let txt_clinic_contact = $('#txt_clinic_contact');
let txt_clinic_email = $('#txt_clinic_email');
let txt_clinic_web = $('#txt_clinic_web');

let btn_register_clinic = $('#btn_register_clinic')


// ___ AJAX Crud functions ___
function createClinic(inpt) {
	let formData = `clnc_name=${inpt.clnc_name}&&clnc_slogan=${inpt.clnc_slogan}&&brnch_address=${inpt.brnch_address}&&brnch_contact=${inpt.brnch_contact}&&brnch_email=${inpt.brnch_email}&&brnch_webiste=${inpt.brnch_webiste}&&usr_name=${inpt.usr_name}&&usr_pass=${inpt.usr_pass}&&usr_full_name=${inpt.usr_full_name}&&usr_contact=${inpt.usr_contact}&&usr_email=${inpt.usr_email}`;
	let url=gbl_rootUrl+'/v1/clinic/create.php';

	console.log(formData);

	$.post(url, formData, function(data, status){
	
		console.log(data);

		let dataObj = JSON.parse(data);
		let uID = dataObj['user_id'];
		if(uID!=-1){
			alert("Operação executada com sucesso\nFaça login usando nome de usuário '"+inpt.usr_name+"' e sua senha");
			window.location = 'index.php';
			clearClinicTxts();
		}
	});
}


function clearClinicTxts(){
	txt_user_full_name.val('');
	txt_user_name.val('');
	txt_user_pass.val('');
	txt_user_pass2.val('');
	txt_user_email.val('');
	txt_user_contact.val('');

	txt_clinic_name.val('');
	txt_clinic_slogan.val('');

	txt_clinic_address.val('');
	txt_clinic_contact.val('');
	txt_clinic_email.val('');
	txt_clinic_web.val('');
}


// ___ Handling button functions ___
$(btn_register_clinic).on('click', function(e){
	e.preventDefault();

	let inputData = {
		clnc_name: txt_clinic_name.val(),
		clnc_slogan: txt_clinic_slogan.val(),

		brnch_address: txt_clinic_address.val(),
		brnch_contact: txt_clinic_contact.val(),
		brnch_email: txt_clinic_email.val(),
		brnch_webiste: txt_clinic_web.val(),

		usr_name: txt_user_name.val(),
		usr_pass: txt_user_pass.val(),
		usr_full_name: txt_user_full_name.val(),
		usr_contact: txt_user_contact.val(),
		usr_email: txt_user_email.val()
	};

	if($('#form_reg_clinic').valid())
		createClinic(inputData);
});


// ___ Validation ____
$('#form_reg_clinic').validate({
	rules:{
		txt_clinic_name:'required',
		txt_clinic_address:'required',
		txt_clinic_contact:'required',
		txt_user_name:'required',
		txt_user_pass:{
			required: true,
			minlength:4
		},
		txt_user_full_name:'required',
		txt_user_contact:'required',

		txt_user_pass2:{
			required: true,
			minlength:4,
			equalTo: '#txt_user_pass'
		},
	},
	messages:{
		txt_clinic_name:'Campo vazio',
		txt_clinic_address:'Campo vazio',
		txt_clinic_contact:'Campo vazio',
		txt_user_name:'Campo vazio',
		txt_user_pass:'Campo vazio',
		txt_user_full_name:'Campo vazio',
		txt_user_contact:'Campo vazio',
		txt_user_pass:'Nova senha deve ter pelo menos 4 caracters',
		txt_user_pass2: 'Senha repetida incorretamente',
	}
}); 