<?php get_header('info'); ?>
<div class="body-full">
<div class="container">
	
    <section class="block-body">         
        <div class="prescription-menu">
        	<ul>
            	<li><a href="<?php echo esc_url( home_url( 'information') ); ?>">Information</a></li>
                <li><a href="<?php echo esc_url( home_url( 'prescription') ); ?>" class="fixed">Prescription</a></li>
                <li><a href="#">Review</a></li>
            </ul>
        </div>
        <div class="prescription-body">
        	<h2>let’s get your prescription</h2>
            <div class="prescription-box">
            	<h3>Upload a photo of it</h3>
                <p>The quickest option.</p>
            </div>
            <hr>
            <div class="prescription-box">
            	<h3>send it to us later</h3>
                <p>Upload a photo of your prescription after you check out.</p>
            </div>
            <hr>
            <div class="prescription-box">
            	<h3>BOOK AN ON DEMAND EYE EXAM</h3>
            </div>
            <hr>
            <div class="prescription-box">
            	<h3>I need reading glasses</h3>
            </div>
        </div>
        <div class="prescription-table">
        	<table width="100%" cellpadding="0" cellspacing="0" border="0">
            	<tbody>
                	<tr>
                    	<td width="87%">subtotal   ( items)</td>
                        <td width="13%">$</td>
                    </tr>
                    <tr>
                    	<td>tax</td>
                        <td>$</td>
                    </tr>
                    <tr>
                    	<td>shipping</td>
                        <td>Free</td>
                    </tr>
                </tbody>
                <tfoot>
                	<tr>
                    	<td>total</td>
                        <td>$     .</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

</div>
</div>
<?php get_footer(); ?>