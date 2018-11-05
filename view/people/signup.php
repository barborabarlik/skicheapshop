<h2>Sign up</h2>
<form method="post" action="?r=people/confirm">
	<label name="name">Username : </label>
	<input type="text" name="name" value="<?php echo $data['name']; ?>"/>
	<label name="email1">Email address : </label>
	<input type="text" name="email1" value="<?php echo $data['email1']; ?>"/>
	<label name="email2">Confirm email address : </label>
	<input type="text" name="email2" value="<?php echo $data['email2']; ?>"/>
	<label name="password1">Password : </label>
	<input type="password" name="password1"/>
	<label name="password2">Confirm password : </label>
	<input type="password" name="password2"/>
	<input type="submit" name ="action" value="Register">
</form>
