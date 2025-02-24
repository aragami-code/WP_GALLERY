<div class="wrap mbg-screen" id="mbg-support-wrap" style="text-align: center">
	<br><br>
	<h2 style="font-size: 30px">Your support request has been submitted</h2>

	<?php if ($_REQUEST['result'] == 1): ?>
		<p><?php _e("It will take from a few hours to a couple of days to answer it, please be patient.", 'mbg')?></p>
	<?php else: ?>
		<strong style="font-size: 15px; color: #555; font-weight: normal">
			Your request was sent with email instead of more reliable HTTP transport due to problems with HTTP.
			<br>If you want to be 100% sure
			it will not be lost - please send a direct email to <a href="">karev.n@gmail.com</a></strong>
	<?php endif ?>
	<p style="text-align: center">
		<img src="<?php echo MBG_URL . "assets/admin/images"?>">
		<br>
		<span style="color: #555; font-size: 16px"></span>
	</p>
</div>