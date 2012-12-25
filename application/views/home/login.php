<?php echo form_open(current_url(), 'class="form-signin"'); ?>
<fieldset class="w50 parallel_target">
	<h2 class="form-signin-heading" >Please log in</h2>
		<input type="text" id="identity" name="login_identity" value="" class="input-block-level" placeholder="Email or Username"/>
		<input type="password" id="password" name="login_password" value="" class="input-block-level" placeholder="Password"/>
		</li>
		<?php
			# Below are 2 examples, the first shows how to implement 'reCaptcha' (By Google - http://www.google.com/recaptcha),
			# the second shows 'math_captcha' - a simple math question based captcha that is native to the flexi auth library.
			# This example is setup to use reCaptcha by default, if using math_captcha, ensure the 'auth' controller and 'demo_auth_model' are updated.

			# reCAPTCHA Example
			# To activate reCAPTCHA, ensure the 'if' statement immediately below is uncommented and then comment out the math captcha 'if' statement further below.
			# You will also need to enable the recaptcha examples in 'controllers/auth.php', and 'models/demo_auth_model.php'.
			#/*
			if (isset($captcha)) {
				echo "<li>\n";
				echo $captcha;
				echo "</li>\n";
			}
			#*/

			/* math_captcha Example
			 # To activate math_captcha, ensure the 'if' statement immediately below is uncommented and then comment out the reCAPTCHA 'if' statement just above.
			 # You will also need to enable the math_captcha examples in 'controllers/auth.php', and 'models/demo_auth_model.php'.
			 if (isset($captcha))
			 {
			 echo "<li>\n";
			 echo "<label for=\"captcha\">Captcha Question:</label>\n";
			 echo $captcha.' = <input type="text" id="captcha" name="login_captcha" class="width_50"/>'."\n";
			 echo "</li>\n";
			 }
			 #*/
		?>
		<label class="checkbox" for="remember_me">
			<input type="checkbox" id="remember_me" name="remember_me" value="1" <?php echo set_checkbox('remember_me', 1); ?>/>
		Remember me	
		</label>
		<input type="submit" name="login_user" id="submit" value="Login" class="btn btn-large btn-primary"/> <a href="/register">I need an account</a>
		<hr/>
		<ul>
			<li><a href="<?php echo $base_url; ?>auth/forgotten_password">Reset Forgotten Password</a></li>
			<li><a href="<?php echo $base_url; ?>auth/resend_activation_token">Resend Account Activation Token</a></li>
		</ul>	
</fieldset>

<?php echo form_close(); ?>