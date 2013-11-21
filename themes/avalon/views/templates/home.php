<?php $this->pageTitle = $model->window_title; 
$this->bodyId = 'home'; 
require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); 
?>
	<!-- Begin #slider -->
	<div id="slider">

		<?php $this->widget('Carousel',array(
			'name'=>'home-carousel',
			'options'=>array(
				'items'	=> 1,
				'auto' => 3000,
			),
		)); ?>

		<div class="constrained">
			<div class="controls">
				<a class="previous">Previous</a>

				<span class="pagination"></span>

				<a class="next">Next</a>
			</div>
		</div>

	</div>
	<!-- End #slider -->

	<!-- Begin #home-nuggets -->
	<section id="home-nuggets">
		<div class="constrained">
			<div class="column one-quarter">
				<?php $this->widget('Nugget',array(
					'name'=>'nugget1',
					'scope'=>'page',
				)); ?>
			</div>

			<div class="column one-quarter">
				<?php $this->widget('Nugget',array(
					'name'=>'nugget2',
					'scope'=>'page',
				)); ?>
			</div>

			<div class="column one-quarter">
				<?php $this->widget('Nugget',array(
					'name'=>'nugget3',
					'scope'=>'page',
				)); ?>
			</div>

			<div class="column one-quarter">
				<?php $this->widget('Nugget',array(
					'name'=>'nugget4',
					'scope'=>'page',
				)); ?>
			</div>
		</div>
	</section>
	<!-- End #home-nuggets -->

	<!-- Begin #photo-steam -->
	<section id="photo-stream">
		<div class="constrained">
			<div class="panel">
				<h2>Photo Stream</h2>
				<h3>Choose tags:</h3>
                                <section id="options" class="combo-filters">
                                    <ul class="tags filter option-set" data-filter-group="category">

                                        <li><label>All<input id="all" data-filter-value=".photo" type="checkbox" /></label></li>

                                        <?php $listWidget = new ListWidget();
                                            $listWidget->name = 'user-photos';
                                            $listWidget->init();
                                            $attributes = $listWidget->itemAttributes();
                                            unset($listWidget);?>

                                        <?php foreach($attributes as $field=>$details): ?>

                                            <?php if(substr($field, 0, 3) == 'tag'):?>

                                        <li><label><?php echo $details['label']?> <span></span><input data-filter-value=".<?php echo $details['class']?>" type="checkbox" /></label></li>

                                            <?php endif; ?>

                                        <?php endforeach; ?>
                                    </ul>
                                </section>
                                
                                
                                <div class="number-of-results">Displaying <span></span> images</div>

				<h3>Get Involved</h3>
				<p>Taken a great photograph at Avalon Marshes? Upload it to our Photo Stream.</p>
				<a href="upload-photo" class="view-more">Upload Photo</a>
			</div>

			<div class="photos" id="photos">
                            <?php $listWidget = new ListWidget();
                                $listWidget->name = 'user-photos';
                                $listWidget->filters = array(
                                    'live' => array(
                                        'field_type' => 'boolean_value',
                                        'value' => 1)
                                );
                                
                                $listWidget->init();
                                $data = $listWidget->contents->getData();
                                
                                foreach($data as $photo):
                                    
                                    $classes = array('photo'); 
                                
                                    foreach($photo as $field=>$value):
                                        
                                        if(substr($field,0,3) == 'tag' && $value)
                                            $classes[] = $attributes[$field]['class'];
                                        
                                    endforeach;  ?>
                                                        
                                    <a data-rel="lightbox:photos" href="<?php echo Yii::app()->getBaseUrl(true) . $photo['photo'] ?>" class="<?php echo implode(' ', $classes)?>"><img src="<?php echo Yii::app()->getBaseUrl(true) . '/thumbs' . $photo['photo'] . '_130x130'; ?>" alt="" /></a>
                                
                                <?php endforeach; ?>
			</div>
		</div>
	</section>
	<!-- End #photo-stream -->

	<!-- Begin #home-lower -->
	<div id="home-lower">
		<div class="constrained">
			<div class="column one-half">
				<div class="twitter container">
					<h2>Twitter</h2>
					<!--
					<ul class="tweets">
						<li><p class="js-tweet-text tweet-text">GPS devices charged and ready for hire. Time to explore the marshes. <a href="/search?q=%23Geocaching&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>Geocaching</b></a> <a href="/search?q=%23nature&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>nature</b></a> <a href="/search?q=%23halfterm&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>halfterm</b></a> <a href="http://t.co/pjZzoJm6lu" rel="nofollow" dir="ltr" data-expanded-url="http://tinyurl.com/p8xo9r7" class="twitter-timeline-link" target="_blank" title="http://tinyurl.com/p8xo9r7"><span class="tco-ellipsis"></span><span class="js-display-url">tinyurl.com/p8xo9r7</span><span class="invisible"></span><span class="tco-ellipsis"><span class="invisible">&nbsp;</span></span></a></p></li>
						<li><p class="js-tweet-text tweet-text"><a href="/SomersetWT" class="twitter-atreply pretty-link" dir="ltr"><s>@</s><b>SomersetWT</b></a> <a href="/Hawkandowluk" class="twitter-atreply pretty-link" dir="ltr"><s>@</s><b>Hawkandowluk</b></a> <a href="/RSPBSouthWest" class="twitter-atreply pretty-link" dir="ltr"><s>@</s><b>RSPBSouthWest</b></a> <a href="/NESouthWest" class="twitter-atreply pretty-link" dir="ltr"><s>@</s><b>NESouthWest</b></a> 127 applicants for apprenticeship scheme! V excited to have 2 starting with us v soon</p></li>
						<li><p class="js-tweet-text tweet-text">Or you can download the Geocaching activity here - <a href="http://t.co/qg4IB4DNbG" rel="nofollow" dir="ltr" data-expanded-url="http://docs.com/XAO4" class="twitter-timeline-link" target="_blank" title="http://docs.com/XAO4"><span class="tco-ellipsis"></span><span class="js-display-url">docs.com/XAO4</span><span class="invisible"></span><span class="tco-ellipsis"><span class="invisible">&nbsp;</span></span></a>. More info re. GPS hire on FB. <a href="/search?q=%23Geocaching&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>Geocaching</b></a> <a href="/search?q=%23wildlife&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>wildlife</b></a> <a href="/search?q=%23halfterm&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>halfterm</b></a></p></li>
					</ul>
					-->

					<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/AvalonMarshes" data-widget-id="402791803570491393" data-chrome="nofooter transparent noheader noborder" data-tweet-limit="3">Tweets by @AvalonMarshes</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>



					<div class="social-media-links">
						<a href="https://twitter.com/AvalonMarshes" class="twitter" title="Follow us on Twiter">Twitter</a>
						<a href="https://www.facebook.com/pages/Avalon-Marshes/352136078173165" class="facebook" title="Find us on Facebook">Facebook</a>
						<a href="#" class="gplus" title="Find us on Google+">Google+</a>
					</div>
				</div>
			</div>

			<div class="column one-half">
				<div class="signup container">
					<h2>Newsletter</h2>
					<input type="email" placeholder="Enter your email to receive our newsletter" />
					<input type="submit" value="Sign up"/>
				</div>

				<div class="partners container">
					<h2>Our Partners</h2>
					<?php $this->widget('RichText', array(
						'name'=>'our partners',
						'scope'=>'page',
					)); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End #home-lower -->

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.isotope.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.carouFredSel-6.2.1.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/prettyCheckable.js"></script>

	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/lightcase.js"></script>
	<script>
		$(document).ready(function($) {
			$('a[data-rel^=lightbox]').lightcase('init');
		});
	</script>

	<script>
		$(document).ready(function() {

			$("#slider .slides").carouFredSel({
				responsive: true,
				auto: 8000,
				scroll: {
					fx: "scroll"
				},
				items: {
					visible: 1
				},
				pagination: "#slider .pagination",
				prev: "#slider .previous",
				next: "#slider .next"
			});

			//$("#photo-stream .tags input[type=checkbox]").prettyCheckable();
		});
	</script>
        <script type="text/javascript">
            
            $(document).ready(function(){
                
		var $container = $('#photos');
		var filters = {};
                
		$container.isotope({itemSelector : '.photo'}, function($items){
                        $('.number-of-results span').html($items.length);
                });
                $('#all').prop('checked', true);
                
                $('.filter input[type=checkbox]').click(function(){
                    
                    var $optionSet = $(this).parents('.option-set');
                    
                    $optionSet.find('input[type=checkbox]').prop('checked', false);
                    $(this).prop('checked', true);
                    
                    var group = $optionSet.attr('data-filter-group');
                    var filterValue = $(this).attr('data-filter-value');
                    
                    filters[group] = filterValue;
                    reFilter();
                });
                
                function reFilter() {
                    var isoFilters = [];
                    
                    for (var prop in filters) {
                        isoFilters.push(filters[prop]);
                    }
                    
                    var selector = isoFilters.join('');
                    
                    $container.isotope({ filter: selector }, function($items){
                        $('.number-of-results span').html($items.length);
                    });
                }
                
            });
            
        </script>
