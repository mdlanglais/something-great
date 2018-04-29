<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Michael Langlais">
    <title>
    <?php
        if(is_404()) {
            echo '\':( Page Not Found';
        } else {
            if(is_front_page()) {
                echo bloginfo('name') . ' | '; 
                echo 'Home';
            } else {
                echo bloginfo('name') . ' | '; 
                wp_title('');
            }
        }
    ?>
    </title>
    
    <link rel="shortcut icon" href="/wp-content/themes/something-great/favicon.png" type="image/x-icon" />
    <!-- include font files -->
    <!-- end including font files -->
	
    <?php wp_head(); ?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="/wordpress/wp-content/themes/something-great/js/vendor/html5shiv.js"></script>
        <script src="/wordpress/wp-content/themes/something-great/js/vendor/respond.min.js"></script>
    <![endif]-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXX-X"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-XXXXXXX-X');
    </script>
    
</head>