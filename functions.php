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
define( 'ALIFY_VERSION', '1.2.0' );
define( 'ALIFY_DIR', get_template_directory() );
define( 'ALIFY_URI', get_template_directory_uri() );

/**
 * Modular includes — one concern per file.
 */
require ALIFY_DIR . '/inc/setup.php';       // Theme supports and content width.
require ALIFY_DIR . '/inc/editor.php';      // Classic Editor (Gutenberg disabled).
require ALIFY_DIR . '/inc/menus.php';       // Navigation menu locations.
require ALIFY_DIR . '/inc/widgets.php';     // Widget areas.
require ALIFY_DIR . '/inc/image-sizes.php'; // Custom image sizes.
require ALIFY_DIR . '/inc/excerpts.php';    // Excerpt length and read-more.
require ALIFY_DIR . '/inc/template-tags.php'; // Reusable template tags.
require ALIFY_DIR . '/inc/enqueue.php';     // Styles and scripts.
require ALIFY_DIR . '/inc/customizer.php';  // Customizer theme options.
require ALIFY_DIR . '/inc/acf.php';         // ACF Pro field groups (local).
require ALIFY_DIR . '/inc/rewrites.php';    // Permalink/rewrite flushing.
require ALIFY_DIR . '/inc/page-setup.php';  // Default pages, menus, reading settings.
require ALIFY_DIR . '/inc/forms/newsletter.php'; // Newsletter form handling.
require ALIFY_DIR . '/inc/forms/quote.php';     // Quick quote form handling.
require ALIFY_DIR . '/inc/seo.php';         // SEO: sitemap hygiene.
require ALIFY_DIR . '/inc/security.php';    // Security hardening.

/**
 * Custom post types and taxonomies — one file per CPT.
 */
require ALIFY_DIR . '/inc/cpt/services.php';     // Services (no taxonomies).
require ALIFY_DIR . '/inc/cpt/project.php';      // Projects + taxonomy.
require ALIFY_DIR . '/inc/cpt/teams.php';        // Teams + taxonomy.
require ALIFY_DIR . '/inc/cpt/industries.php';   // Industries + taxonomy.
require ALIFY_DIR . '/inc/cpt/case_studies.php'; // Case Studies + taxonomy.
require ALIFY_DIR . '/inc/cpt/pricing.php';      // Pricing (archive only) + taxonomy.
require ALIFY_DIR . '/inc/cpt/faqs.php';         // FAQs (archive only) + taxonomy.
require ALIFY_DIR . '/inc/cpt/testimonials.php'; // Testimonials (archive only) + taxonomy.
