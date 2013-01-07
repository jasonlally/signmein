<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed'); ?>

<?php if (! empty($message)) { ?>
<div id="messages">
	<?php echo $message; ?>
</div>
<?php } ?>

<?php echo form_open(current_url(),'class="form-sign-in"')
?>
<fieldset>
	<legend>
		Sign in
	</legend>
	<div class="controls-row">
		<div class="control-group span12">
			<label for="signin_email" class="control-label">Email</label>
			<div class="controls">
				<input id="email" name="signin_email" type="text" class="span12" placeholder="Email address" autocomplete="off" value="<?php echo set_value('signin_email'); ?>">
			</div>
		</div>
	</div>
	<div class="controls-row">
		<div class="control-group span6">
			<label for="signin_fname" class="control-label">First Name</label>
			<div class="controls">
				<input id="fname" name="signin_fname" type="text" class="span12" placeholder="First Name" autocomplete="off" value="<?php echo set_value('signin_fname'); ?>">
			</div>
		</div>
		<div class="control-group span6">
			<label for="signin_lname" class="control-label">Last Name</label>
			<div class="controls">
				<input id="lname" name="signin_lname" type="text" class="span12" placeholder="Last Name" autocomplete="off" value="<?php echo set_value('signin_lname'); ?>">
			</div>
		</div>
	</div>
	<div class="controls-row">
		<div class="control-group span8">
			<label for="first-name" class="control-label">Phone</label>
			<div class="controls">
				<input id="phone" name="signin_phone" type="text" class="span12" placeholder="Phone" autocomplete="off" maxlength="15" value="<?php echo set_value('signin_phone'); ?>">
			</div>
		</div>
		<div class="control-group span4">
			<label for="middle-initial" class="control-label">Zip Code</label>
			<div class="controls">
				<input id="zipcode" name="signin_zip" type="text" class="span12" placeholder="Zip Code" autocomplete="off" maxlength="5" value="<?php echo set_value('signin_zip'); ?>">
			</div>
		</div>
	</div>
	<label class="checkbox">
		<input type="checkbox">
		____________ can send me updates in the future </label>
	<input type="submit" id="signin_identity" name="signin_identity" class="btn btn-large btn-primary" value="Submit"/>
</fieldset>
<?php echo form_hidden('signin_form_owner', $form_owner_id); ?>
</form>