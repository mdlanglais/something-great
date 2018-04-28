<?php

	/**
	 * The front page template file
	 *
	 * Home Page Template file for <Enter Site Name>
	 *
	 * @Author: Michael Langlais
	 * @Date: Month, Day Year
	 * 
	 */

	get_header(); 

	get_template_part('templates/front-page/front-page', 'hero');

	get_template_part('templates/front-page/front-page', 'first-section');

	get_template_part('templates/front-page/front-page', 'aside');

	get_template_part('templates/front-page/front-page', 'second-section');

	get_footer();

?>