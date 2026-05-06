<!DOCTYPE html>
<html>
<head>
	<title>Medicare</title>
	<meta charset="utf-8">

	<link href="Assets/custom/front-end/css/style_boiler_plate_login.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/png" href="Assets/custom/front-end/resouces/imgs/logo.png">
</head>
<body>
	<div class="main_reg">
		
		<table class="table_school_reg_form_head">
			<tr>
				<td> <img class="img_school_reg_form" src="Assets/custom/front-end/resouces/imgs/logo.png"> </td>
				<td> <h2>Formulário de cadastro</h2>  </td>
			</tr>
		</table>

		<br>

		<!-- <form id="frm_school_reg" method="" action=""> -->
			<form id="form_reg_clinic" class="login-form">

				<table class="table_reg_form">
					
					<tr> <td class="td_reg">Nome completo</td> 
					<td><input id="txt_user_full_name" name="txt_user_full_name" class="form-input" type="text" name="full_name" placeholder="Ex. Joao Pedro"></td> </tr>

					<tr> <td class="td_reg">Usuário</td> 
					<td><input id="txt_user_name" name="txt_user_name" class="form-input" type="text" name="user_name" placeholder="Ex. jpedro"></td> </tr>

					<tr> <td class="td_reg">Palavra-passe</td> 
					<td><input id="txt_user_pass" name="txt_user_pass" class="form-input" type="Password" name="password" placeholder=""></td> </tr>

					<tr> <td class="td_reg">Repetir palavra-passe</td> 
					<td><input id="txt_user_pass2" name="txt_user_pass2" class="form-input" type="Password" name="rep_password" placeholder=""></td> </tr>

					<!-- Add email in phase 2 -->
					<tr> <td class="td_reg">Email</td> 
					<td><input id="txt_user_email" name="txt_user_email" class="form-input" type="email" name="user_email" placeholder=""></td> </tr>

					<!-- Add email in phase 2 -->
					<tr> <td class="td_reg">Contacto</td> 
					<td><input id="txt_user_contact" name="txt_user_contact" class="form-input" type="text" placeholder=""></td> </tr>


					<tr>
						<td colspan="2"> <hr> </td>
					</tr>

					<tr> <td class="td_reg">Nome da clinica</td> 
					<td><input id="txt_clinic_name" name="txt_clinic_name" class="form-input" type="text"></td> </tr>

					<tr> <td class="td_reg">Slogan</td> 
					<td><input id="txt_clinic_slogan" name="txt_clinic_slogan" class="form-input" type="text"></td> </tr>

					<!-- <tr> <td class="td_reg">Provincia</td> 
					<td>
						<select id="txt_school_prov" class="form-input" style="width: 92%"></select> 
					</tr>  -->

					<tr> <td class="td_reg">Endereço</td> 
					<td><input id="txt_clinic_address" name="txt_clinic_address" class="form-input" type="text" placeholder="Ex. Av. Albert Lithuli N.123"></td> </tr> 

					<tr> <td class="td_reg">Contacto</td> 
					<td><input id="txt_clinic_contact" name="txt_clinic_contact" class="form-input" type="text" placeholder="" ></td> </tr> 

					<tr> <td class="td_reg">Email</td> 
					<td><input id="txt_clinic_email" name="txt_clinic_email" class="form-input" type="text" placeholder="Ex. contacto@clinica.org"></td> </tr> 

					<tr> <td class="td_reg">Website</td> 
					<td><input id="txt_clinic_web" name="txt_clinic_web" class="form-input" type="text" placeholder="Ex. www.clinica.org"></td> </tr> 

					<tr> 
						<td></td> 
						<td class="td_confirm_button_box">
							<button id="btn_register_clinic"  class="button btn-login">
								Cadastrar
							</button>
						</td> 
					</tr> 
					
				</table>

			</form>
		<!-- </form> -->
	</div>

	<p class="water-mark"> VIALGO .LDA</p>

	<script src="Assets/frameworks/bootstrap-5.0.0/js/jquery-2.1.1.min.js"></script>
	<script src="Assets/frameworks/jqueryvalidate/jquery.validate.min.js"></script>
	<script src="Assets/custom/front-end/js/register.js"></script>
</body>
</html>