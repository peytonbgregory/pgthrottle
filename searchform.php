<?php global $pgsearchclass; ?>
<div class="<?php echo $pgsearchclass ?>">
    <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
        <div class="input-group mb-3">
            <label class="d-none" for="search">Search</label>
            <input type="text" class="form-control" name="s" id="search" placeholder="Search <?php echo get_bloginfo('name','pgthrottle')?>" />

            <div class="input-group-append">
                <input type="submit" class="btn btn-primary" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'pgthrottle' ); ?>" />
            </div>
        </div>
    </form>
</div>
