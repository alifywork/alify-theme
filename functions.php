<?php
/**
 * ALIFY theme bootstrap.
 *
 * This file only defines constants and loads the modular includes from
 * /inc — keep every feature in its own file, never dump code here.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme constants.
 */
define( 'ALIFY_VERSION', '1.0.0' );
define( 'ALIFY_DIR', get_template_directory() );
define( 'ALIFY_URI', get_template_directory_uri() );

/**
 * Modular includes — one concern per file.
 */
require ALIFY_DIR . '/inc/setup.php';       // Theme supports and content width.
require ALIFY_DIR . '/inc/menus.php';       // Navigation menu locations.
require ALIFY_DIR . '/inc/widgets.php';     // Widget areas.
require ALIFY_DIR . '/inc/image-sizes.php'; // Custom image sizes.
require ALIFY_DIR . '/inc/excerpts.php';    // Excerpt length and read-more.
require ALIFY_DIR . '/inc/template-tags.php'; // Reusable template tags.
require ALIFY_DIR . '/inc/enqueue.php';     // Styles and scripts.
require ALIFY_DIR . '/inc/customizer.php';  // Customizer theme options.
require ALIFY_DIR . '/inc/security.php';    // Security hardening.
