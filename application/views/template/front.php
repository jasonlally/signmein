<?php echo $basejs
?>
<div class="container-narrow">
	<div class="masthead">
		<ul class="nav nav-pills pull-right">
			<li class="<?php echo isActive($pageName,"")?>">
				<a href="/">Home</a>
			</li>
			<li class="<?php echo isActive($pageName,"about")?>">
				<a href="/about">About</a>
			</li>
			<li class="<?php echo isActive($pageName,"contact")?>">
				<a href="/contact">Contact</a>
			</li>
			<li class="<?php echo isActive($pageName,"register")?>">
				<a href="/register">Register</a>
			</li>
			<li class="<?php echo isActive($pageName,"login")?>">
				<a href="/login">Login</a>
			</li>
		</ul>
		<h3 class="muted">Sign Me In</h3>
	</div>

	<hr>
	<?php echo $content_body
	?>

	<div class="footer">
		<p>
			&copy; Digital City Labs 2012
		</p>
	</div>
</div>

