<!-- Full Width Image Header with Logo -->
<!-- Image backgrounds are set within the full-width-pics.css file. -->
<header class="image-bg-fluid-height">
    <img class="img-responsive img-center" src="<?php if(has_post_thumbnail()): the_post_thumbnail_url(); else : ?>http://dummyimage.com/200x200/eeeeee/222222<?php endif; ?>" alt="">
</header><!-- header -->