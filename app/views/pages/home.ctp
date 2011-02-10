<?php
	// Inclusion of the homepage banners CSS and Javascript files
	echo $this->Html->css('bannerSlideshow', null, array('inline' => false));
	echo $this->Html->script('bannerSlideshow', array('inline' => false));
?>

<div id="home_page">
	<div class="two_col_layout">
		<div class="col1">
			<h1 class="hReplaced_red">Elite Model Companions</h1>
			<p>We are proud to welcome you to our high class Newcastle, Central Coast and Sydney escort agency.</p>
			<p>At Elite Model Companions we endeavor to offer some of the most naturally beautiful, classy and sophisticated women available, catering to clientele of style, sophistication, class and importance.
			We guarantee that you will always receive our full attention to your requests and we will always strive to make your date both perfect and memorable. Not only are we looking to facilitate the most discerning of clients but we are venturing to provide a level of service exceeding the expectations of our valued clientele.</p>
			<p>Elite Model Companions prides itself in its competency with discretion and its reliability with providing the highest standards in the escort industry.</p>
			<p>All our photo’s and model’s ages are 100% genuine, so the companion you choose is the model that will arrive. We interview all our escorts and can verify that all girls have been carefully selected for their unique style, beauty, elegance and charismatic personality.<br/>
			We also have Model Companions that are new and not yet in our gallery.  We are happy to assist you with a profile and description.</p>

			<p>Our Model companions include “girl next door”, catwalk models, bikini models, photographic models, actresses, promo models, university students, and models that have appeared in beauty pageants, and publications including, penthouse, FHM, Ralph, Zoo, Picture and bikini calendars.</p>
			<p>Elite Model Companions models specialise in providing our clients with a genuine girlfriend experience, however they are also perfect for that fun party type of booking. We also have models that are excellent with couples and provide real lesbian doubles.</p>
		</div>
		<div class="col2">
			<?php
				echo $this->element('featuredModel', array('cache' => '+5 hours'));
			?>
		</div>
	</div>
	<div class="clear"></div>
</div>