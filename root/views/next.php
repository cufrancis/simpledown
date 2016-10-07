<center>
	<div style="margin-top:10px;">
		<?php
			$presview = "view/" . $pres;
			$nextview = "view/" . $next;
		?>
		<a href="<?php echo site_url() ?>">上一页</a>
		<?php echo nbs(10); ?>
		<a href="<?php echo base_url();?>">首  页</a>
		<?php echo nbs(10); ?>
		<a href="<?php echo site_url() ?>">下一页</a>
	</div>
</center>