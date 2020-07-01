

		<div class="foundations-image" id="soloFooterNav">
            <ul class="foundations-menu">
                <li><a href="http://www.willgrantvision.com/why/" target="_blank">Why</a></li>
                <li><a href="http://www.willgrantvision.com/how/" target="_blank">How</a></li>
                <li><a href="http://www.willgrantvision.com/what/" target="_blank">What</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/how-it-works/" data-src="<?php bloginfo('siteurl'); ?>/how-it-works/" data-fancybox="how" data-type="iframe">How it Works</a></li>
                <li><a href="javascript:;" data-fancybox data-type="inline" data-src="#vsShippingInfo">Shipping</a></li>
                <li><a href="javascript:;" data-fancybox data-type="inline" data-src="#vsReturnInfo">Returns</a></li>
                <li><a href="<?php echo esc_url( home_url( 'my-account') ); ?>"><span><?php if (is_user_logged_in()){ echo 'My Account'; }else{ echo 'Login/Register'; } ?></span></a></li>
            </ul>
        </div>  
        
        
        <div id="vsShippingInfo" class="vsModal" style="display: none;">
        
        	<div class="vsModalContent">
            	<h1>Shipping</h1>
                <p>Shipping is free, thanks to our supportive third-party sellers who cover the cost. Enjoy!</p>
            </div>
        
        </div>
        
        
        
        <div id="vsReturnInfo" class="vsModal" style="display: none;">
        
        	<div class="vsModalContent">
            	<h1>Returns (Exchanges):</h1>
                <p>Buyers are responsible for any shipping cost to return an item. We do not return, we recycle. You can exchange any item, at any time, for free, as part of our recycle program. It’s simple - send us your old glasses and receive a refurbished recycled pair in exchange.</p>
                
                <p><em>* Prescription lenses starting as low as $45.</em></p>
            </div>
        
        </div>