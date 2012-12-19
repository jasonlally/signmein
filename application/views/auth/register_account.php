<!-- Main Content -->
<?php if (! empty($message)) { ?>
<div id="message">
	<?php echo $message; ?>
</div>
<?php } ?>

<?php echo form_open(current_url(), array('class' => 'form-signin')); ?>
	<h2 class="form-signin-heading">Sign Up</h2>
	<input type="text" id="email_address" name="register_email_address" value="<?php echo set_value('register_email_address'); ?>" class="input-block-level" placeholder="Email address">
	<input type="password" id="password" name="register_password" value="<?php echo set_value('register_password'); ?>" class="input-block-level" placeholder="Password">
	<input type="password" id="confirm_password" name="register_confirm_password" value="<?php echo set_value('register_confirm_password'); ?>" class="input-block-level" placeholder="Confirm password">
	<input type="submit" name="register_user" id="submit" value="Sign Up" class="btn btn-large btn-primary"/>
<?php echo form_close(); ?>