<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
<a class="brand" href="#">Sign Me In</a>
<div class="nav-collapse collapse">
	<p class="navbar-text pull-right">
		Logged in as <a href="#" class="navbar-link"><?php echo $this->flexi_auth->get_user_identity(); ?></a>
	</p>
	<?php echo $top_nav;?>
</div><!--/.nav-collapse -->

