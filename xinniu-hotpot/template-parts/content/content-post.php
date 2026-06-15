<?php
/**
 * Default post content.
 *
 * @package Xinniu_Hotpot
 */

get_template_part( 'template-parts/content/content', is_singular() ? 'single' : 'archive' );

