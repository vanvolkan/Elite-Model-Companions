<h1>Welcome admin</h1>

<p>Below are a list of tasks and stats for Elite Model Companions</p>
<div class="two_col_layout">
	<div class="col1">
		<div class="contentBox">
			<div class="contentBoxHeading"><h2><span>Quick Links</span></h2></div>
			<div class="contentBoxContent">
				<div class="tableStyleHorizontalList">
					<ul>
						<li class="first-child"><?php echo $this->Html->link('Add a new Elite Model', array('controller' => 'elite_models', 'action' => 'add', 'admin' => true)); ?></li>
						<li><?php echo $this->Html->link('View all Elite Models', array('controller' => 'elite_models', 'action' => 'index', 'admin' => true)); ?></li>
						<li><?php echo $this->Html->link('Goto public area website', '/'); ?></li>
						<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col2">
		<div class="contentBox">
			<div class="contentBoxHeading"><h2><span>Site Stats</span></h2></div>
			<div class="contentBoxContent">
				<div class="adminCountBox">
					<p><span><?php echo $eliteModelCount; ?></span> Elite Models in database.</p>
				</div>
				<div class="adminCountBox">
					<p><span><?php echo $bookingCount; ?></span> bookings made via online booking.</p>
				</div>
				<div class="adminCountBox">
					<p><span><?php echo $employmentCount; ?></span> employment submissions made online.</p>
				</div>
				<div class="adminCountBox">
					<p><span><?php echo $contactCount; ?></span> contact form submissions made online.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>