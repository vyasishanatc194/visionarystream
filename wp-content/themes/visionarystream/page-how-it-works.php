<?php 
/* Template Name: How It Works */ 
get_header('intro'); 

?>

<div id="hiw">

  <div class="hiwIntro">

    <section id="identity">
    
        <div class="row clearfix">
        
            <div class="col col-xs-12">
            
                <h1><img src="<?php bloginfo('template_url'); ?>/images/how-it-works/logo.png" alt="How It Works" /></h1>
            
            </div>
        
        </div>
    
    </section>
    
    <section id="content">
    
    	<div class="row clearfix">
        
        	<div class="col col-xs-12 col-sm-4" id="unique">
            
            	<img src="<?php bloginfo('template_url'); ?>/images/how-it-works/logoUnique.png" alt="Independent and Unique" />
                
                <h2>Independent &amp; Unique</h2>
                
                <p>Extraordinary designers showcase &amp; sell their glasses on VISIONARYSTREAM.COM</p>
            
            </div>
            
            <div class="col col-xs-12 col-sm-4" id="sustainable">
            
            	<img src="<?php bloginfo('template_url'); ?>/images/how-it-works/logoSustainable.png" alt="Sustainable" />
                
                <h2>Sustainable</h2>
                
                <p>Will Grant Vision Foundation funds program services by receiving a percentage from each sale made on the site.</p>
            
            </div>
            
            <div class="col col-xs-12 col-sm-4" id="eyecare">
            
            	<img src="<?php bloginfo('template_url'); ?>/images/how-it-works/logoEyecare.png" alt="Eyecare for Everyone" />
                
                <h2>Eyecare for Everyone</h2>
                
                <p>8 out of 10 people suffer from vision loss needlessly.  Got vision?  Get your next pair of glasses on VISIONARYSTREAM.COM &amp; find out.</p>
            
            </div>
        
        </div>
        
        <div class="row">
        
        	<div class="col col-xs-12" id="learnMore">
            
            	<a href="javascript:parent.$.fancybox.close();" id="fancyClose" class="chunky">Get Something</a>
            
            </div>
        
        </div>
    
    </section>
    
    <footer>
    
    	<div class="row">
        
        	<div class="col col-xs-12" id="smallprint">
            
            	<p>*A minimum of 30% of each sale goes to services and programs for the Will Grant Vision Foundation.</p>
            
            </div>
        
        </div>
        
        <div class="row">
        
        	<div class="col col-xs-12" id="modalMore">
            
            	<p><a href="javascript:;" id="hiwBtnLearnMore">Learn More &gt;</a></p>
            
            </div>
        
        </div>
    
    </footer>
    
  </div><!-- /#hiwIntro -->
    
    <div id="moreInfo">
        
        <div class="row">
    
            <div class="col col-xs-12">
    
                <h3>“VISIONARYSTREAM was built to provide <strong>sustainability</strong> <span>for Will Grant Vision &amp; <strong>visibility</strong> for eyewear designers.”</span></h3>
                
                <p class="emText"><em>It is very difficult for small, independent eyewear designers to compete for shelf-space in most glasses stores because the industry is dominated by a few, very powerful companies. In the spirit of independence, we envision a platform that providers more visibility <nobr>for all.</nobr></em></p>
                
                <h4>#visioniscool</h4>
                
                <p>VISIONARYSTREAM is a platform that uses commissions from sales on the site to fund Will Grant Vision’s mission to prevent vision loss.</p>
                
                <p>The third-party sellers featured on the site are small businesses that create extraordinary eyewear.  Each brand is unique and you may not find their eyeglasses anywhere else on the web.  Will Grant Vision receives 30% of each sale, and the small business eyewear company receives the remaining 70%.  The sales commission that Will Grant Vision receives directly funds free eye exams and glasses for people most at-risk of going without.</p>
                
                <p class="emText"><em>It costs Will Grant Vision $33 to give an eye exam and a pair of glasses - no profit added.<br />A purchase of $110 or more gives someone vision.</em></p>
                
                <h3 class="upper">Got vision?</h3>
                
                <p class="upper smallprint"><small>Get your next pair of glasses on visionarystream.com & find out.</small></p>
                
                <p class="emText smallprint"><small><em>Will Grant Vision is a 501 c3 for purpose.org</em></small></p>
                
                <p class="upper smallprint"><small>Our name is our mission<br />The mission is to give vision</small></p>
        
            </div>
            
        </div>
        
        <div class="row">
        
        	<div class="col col-xs-12" id="modalBack">
            
            	<p><a href="javascript:;" id="hiwBtnLearnMoreBack">&lt; back</a></p>
            
            </div>
        
        </div>
    
    </div>

</div>

<script>
jQuery(document).ready(function(){
	
	jQuery('#hiwBtnLearnMore').on('click', function() {
		jQuery('#moreInfo').addClass('reveal');
		jQuery('.hiwIntro').addClass('invisible');
		jQuery("html, body").animate({ scrollTop: 0 }, 600);
	});
	
	jQuery('#hiwBtnLearnMoreBack').on('click', function() {
		jQuery('#moreInfo').removeClass('reveal');
		jQuery('.hiwIntro').addClass('visibleBehind').removeClass('invisible');
		setTimeout(function(){
  			jQuery('.hiwIntro').removeClass('visibleBehind');
		}, 800);

	});
 
});
</script>



<?php get_footer('hiw'); ?>