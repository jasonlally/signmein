<?php echo $basejs?>
<?php echo ( isset( $nav ) ) ? $header : ''; ?>
<div class="<?php echo ( ! isset($container) OR $container == 'fluid') ? 'container-fluid' : 'container'; ?>">
	<div class="row-fluid">
			<?php if (isset($sidebar_menu)):
			?>
			<div class="span3">
				<div class="well sidebar-nav">
					<?php echo $sidebar_menu; ?>
				</div><!--/well-->
			</div><!--/span-->
			<?php endif; ?>
		<div class="<?php echo ( isset( $sidebar_menu ) ) ? 'span9' : 'span12'; ?>">
			<?php echo $content_body
			?>
		</div><!--/span-->
	</div><!--/row-->

	<hr>
<?php if(isset( $footer )) : ?>
	<footer id="footer">
			<?php echo $footer?>
	</footer>
<?php endif; ?>
</div><!--/.fluid-container-->

