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
				
			echo $this->Html->css(array('main', 'sifr'));
			
			echo $this->Html->script(array('jquery-1.5.min', 'sifr', 'sifr-config'));
			
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
			<!-- Begin Admin Menu -->
			<?php echo $this->element('mainMenu', array('currentPage' => $this->here, 'admin' => true)); ?>
			<!-- Begin Body -->
			<div id="mainBody" class="section">
				<div class="content">
					<div class="roundedBottomMain">
						<div class="padded">
							<div id="content_page">
								<?php echo $this->Session->flash(); ?>
								<?php echo $this->Session->flash('email'); ?>

								<?php echo $content_for_layout; ?>
							</div>
							
							<div id="footer">
								<?php echo $this->element('footer'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $this->element('sql_dump'); ?>
	</body>
</html>