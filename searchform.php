<?php
    
    /*
     *
     * Template Name: Search Form
     * Author: Michael Langlais
     * 
     */

?>

    <form method="get" id="searchform" class="form-inline my-2 my-lg-0" action="<?php echo get_site_url(); ?>">
        <input class="form-control mr-sm-2" type="text" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'something-great'); ?>">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>