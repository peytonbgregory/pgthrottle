<?php global $pgsearchclass; ?>
<div class="<?php echo $pgsearchclass ?> search-icon-wrapper">
    <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
        <div class="input-group">
            <label class="d-none" for="search">Search</label>
            <div class="input-group-append">
                <button type="submit" name="submit" id="searchsubmit" class="p-0"><i class="fa fa-search px-2 text-primary m-0 animation-element slide-left in-view"></i></button>

            </div>
            <input type="text" class="form-control small pl-1" name="s" id="search" placeholder="Search..." />
            <input type="hidden" name="post_type" value="projects" />

        </div>
    </form>
</div>
