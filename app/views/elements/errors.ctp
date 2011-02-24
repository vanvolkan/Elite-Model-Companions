<?php
	// views/elements/errors.ctp
	if (!empty($errors)):
?>
	<div class="errors notice-error">
		<h3>There are <?php echo count($errors); ?> error(s) in your submission</h3>
		
		<ul>
			<?php foreach ($errors as $error): ?>
			<li><?php echo $error; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>