<html>
<head>

<meta charset="utf-8">
<title>TCC Reginaldo</title>

<!-- Le styles -->
<link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" >

</head>

</body>
<div id="login_page">

	<?php echo form_open('login/validate_login'); ?>
			
			<fieldset>
		
			<legend>Login</legend>

				<div class="control-group">
					<label class="control-label" for=""></label>
				    <div class="controls ">
				      <input class="input-xlarge" type="text" id="" name="login" placeholder="Usuário">
				    </div>
				  </div>
  
				  <div class="control-group">
				    <label class="control-label" for=""></label>
				    <div class="controls">
				      <input type="password" name="password" placeholder="Senha">
				    </div>
				  </div>
	
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Acessar</button>
			</div>

	
		</fieldset>
	</form>

</div>
</body>
</html>