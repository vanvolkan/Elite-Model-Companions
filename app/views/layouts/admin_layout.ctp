<!DOCTYPE html> 
<html> 
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo $title_for_layout; ?><?php __(' - ADMIN INTERFACE'); ?></title>
		<?php
			echo $this->Html->meta(
				'description',
				'Enter description here'
			);
			
			echo $this->Html->meta(
				'keywords',
				'Companions, More Here, Blah'
			);			
			
			echo $this->Html->meta('icon');
				
			echo $this->Html->css(array('main', 'sifr', 'jquery-ui-1.8.10.custom', 'prettyPhoto'));
			
			echo $this->Html->script(array('jquery-1.5.min', 'sifr', 'sifr-config', 'jquery-ui-1.8.10.custom.min', 'siteWideFunctions', 'jquery.prettyPhoto'));
			
			echo $scripts_for_layout;
		?>
		
		<!--[if lte IE 6]>
			<?php echo $this->Html->script('supersleight-min'); ?>
		<![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<!-- Begin Header -->
			<div id="header" class="section">
				<div class="content headerBG">
					<?php echo $this->Html->tag('h1', $this->Html->link($this->Html->tag('span', 'Elite Model Companions'), '/', array('escape' => false, 'class' => 'hidespan')), array('id' => 'eliteLogoHeader')); ?>
					
				</div>
			</div>
			<?php if (isset($__ADMIN_USER__)): ?>
			<!-- Begin Admin Menu -->
			<?php echo $this->element('mainMenu', array('currentPage' => $this->here, 'admin' => true)); ?>
			<?php endif; ?>
			<!-- Begin Body -->
			<div id="mainBody" class="section">
				<div class="content">
					<div class="roundedBottomMain">
						<div class="padded">
							<div id="content_page">
								<div class="notice-info">Welcome to the admin area of the website. <?php echo $this->Html->link('Click here to go to the public website', '/', array('escape' => false)); ?></div>
								<?php echo $this->Session->flash(); ?>
								<?php echo $this->Session->flash('email'); ?>

								<?php echo $content_for_layout; ?>
							</div>
							
							<div id="footer">
								<div class="webCopyright">
									<p>Web design &amp; Web Development - <a href="mailto:ohyeahmedia@gmail.com">Oh Yeah Media</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $this->Js->writeBuffer(); ?>
	</body>
</html>