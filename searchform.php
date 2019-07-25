<div class="card bg-secondary border-primary text-light p-1">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">	
		<div class="form-row m-0 p-0 align-items-center justify-content-between">
			<div class="col">
				<input type="text" class="p-0 bg-secondary text-light border-0 w-100" name="s" id="s" placeholder="Search <?php echo get_bloginfo('name','pgthrottle')?>" />
			</div>
			<div class="col-auto">
				<input onClick="ga('send', 'event', { eventCategory: 'Search', eventAction: 'click', eventLabel: 'Search Form Btn', eventValue: 1});" type="submit" class="btn btn-primary" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'pgthrottle' ); ?>" />
			</div>
		</div>
	</form>
</div>