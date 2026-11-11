<?php
/**
 * ACF Pro field groups (local registration).
 *
 * Registers the theme's custom fields on theme pages, CPTs and the
 * "ALIFY Settings" options page. Everything is optional: templates fall
 * back to built-in defaults whenever ACF is inactive or a field is empty.
 *
 * Field schema (matches template usage):
 * - Options page: contact_email / contact_phone / contact_hours,
 *   home_cta_title, archive hero title/sub pairs, projects_cta_url.
 * - front-page.php: home_hero_*, home_*_title overrides.
 * - page-about.php: about_* overrides.
 * - page-contact.php: contact_hero_title / contact_global_title.
 * - services + industries: features (repeater: feature).
 * - project: project_stats (repeater: value/label), gallery, client,
 *   industry, services_list, year.
 * - case_studies: case_stat, case_stat_note, client.
 * - pricing: price, price_note, features (repeater), plan_highlight,
 *   pricing_badge.
 * - teams: role. - testimonials: author_role.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_acf_init' ) ) {
	/**
	 * Register the options page and all local field groups.
	 */
	function alify_acf_init() {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		/* -----------------------------------------------------------
		 * Options page (ALIFY Pro only — skipped gracefully when absent).
		 * ----------------------------------------------------------- */
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page(
				array(
					'page_title' => 'ALIFY Theme Settings',
					'menu_title' => 'ALIFY Settings',
					'menu_slug'  => 'alify-settings',
					'capability' => 'manage_options',
					'redirect'   => false,
					'icon_url'   => 'dashicons-admin-generic',
					'position'   => 59,
				)
			);
		}

		acf_add_local_field_group(
			array(
				'key'                   => 'group_alify_settings',
				'title'                 => 'Theme Settings (Global)',
				'fields'                => array(
					array(
						'key'   => 'field_alify_settings_contact_tab',
						'label' => 'Contact Info',
						'name'  => '',
						'type'  => 'tab',
					),
					array(
						'key'   => 'field_alify_contact_email',
						'label' => 'Contact Email',
						'name'  => 'contact_email',
						'type'  => 'email',
					),
					array(
						'key'   => 'field_alify_contact_phone',
						'label' => 'Contact Phone',
						'name'  => 'contact_phone',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_contact_hours',
						'label' => 'Contact Hours',
						'name'  => 'contact_hours',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_settings_sections_tab',
						'label' => 'Section Overrides',
						'name'  => '',
						'type'  => 'tab',
					),
					array(
						'key'   => 'field_alify_home_cta_title',
						'label' => 'Home CTA Title',
						'name'  => 'home_cta_title',
						'type'  => 'text',
					),
					array(
						'key'     => 'field_alify_services_hero_title',
						'label'   => 'Services Hero Title',
						'name'    => 'services_hero_title',
						'type'    => 'text',
						'wrapper' => array( 'id' => 'alify-services-hero' ),
					),
					array(
						'key'   => 'field_alify_services_hero_sub',
						'label' => 'Services Hero Subtitle',
						'name'  => 'services_hero_sub',
						'type'  => 'textarea',
						'rows'  => 3,
					),
					array(
						'key'   => 'field_alify_projects_hero_title',
						'label' => 'Projects Hero Title',
						'name'  => 'projects_hero_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_projects_hero_sub',
						'label' => 'Projects Hero Subtitle',
						'name'  => 'projects_hero_sub',
						'type'  => 'textarea',
						'rows'  => 3,
					),
					array(
						'key'   => 'field_alify_projects_cta_url',
						'label' => 'Projects CTA Button URL',
						'name'  => 'projects_cta_url',
						'type'  => 'url',
					),
					array(
						'key'   => 'field_alify_cases_hero_title',
						'label' => 'Case Studies Hero Title',
						'name'  => 'cases_hero_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_cases_hero_sub',
						'label' => 'Case Studies Hero Subtitle',
						'name'  => 'cases_hero_sub',
						'type'  => 'textarea',
						'rows'  => 3,
					),
					array(
						'key'   => 'field_alify_industries_hero_title',
						'label' => 'Industries Hero Title',
						'name'  => 'industries_hero_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_industries_hero_sub',
						'label' => 'Industries Hero Subtitle',
						'name'  => 'industries_hero_sub',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'alify-settings',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);

		/* -----------------------------------------------------------
		 * Home page (front-page.php).
		 * ----------------------------------------------------------- */
		acf_add_local_field_group(
			array(
				'key'                   => 'group_alify_home',
				'title'                 => 'Home Page Content',
				'fields'                => array(
					array(
						'key'   => 'field_alify_home_hero_eyebrow',
						'label' => 'Hero Eyebrow',
						'name'  => 'home_hero_eyebrow',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_home_hero_title',
						'label' => 'Hero Title',
						'name'  => 'home_hero_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_home_hero_sub',
						'label' => 'Hero Subtitle',
						'name'  => 'home_hero_sub',
						'type'  => 'textarea',
						'rows'  => 3,
					),
					array(
						'key'   => 'field_alify_home_hero_cta_primary',
						'label' => 'Hero Primary Button Text',
						'name'  => 'home_hero_cta_primary',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_home_titles_tab',
						'label' => 'Section Titles',
						'name'  => '',
						'type'  => 'tab',
					),
					array(
						'key'   => 'field_alify_home_services_title',
						'label' => 'Services Section Title',
						'name'  => 'home_services_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_home_work_title',
						'label' => 'Featured Work Section Title',
						'name'  => 'home_work_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_home_process_title',
						'label' => 'Process Section Title',
						'name'  => 'home_process_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_home_case_title',
						'label' => 'Case Studies Section Title',
						'name'  => 'home_case_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_home_industries_title',
						'label' => 'Industries Section Title',
						'name'  => 'home_industries_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_home_testimonials_title',
						'label' => 'Testimonials Section Title',
						'name'  => 'home_testimonials_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_home_pricing_title',
						'label' => 'Pricing Section Title',
						'name'  => 'home_pricing_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_home_faq_title',
						'label' => 'FAQ Section Title',
						'name'  => 'home_faq_title',
						'type'  => 'text',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'page_template',
							'operator' => '==',
							'value'    => 'front-page.php',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);

		/* -----------------------------------------------------------
		 * About page (page-about.php).
		 * ----------------------------------------------------------- */
		acf_add_local_field_group(
			array(
				'key'                   => 'group_alify_about',
				'title'                 => 'About Page Content',
				'fields'                => array(
					array(
						'key'   => 'field_alify_about_hero_title',
						'label' => 'Hero Title',
						'name'  => 'about_hero_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_about_hero_sub',
						'label' => 'Hero Subtitle',
						'name'  => 'about_hero_sub',
						'type'  => 'textarea',
						'rows'  => 3,
					),
					array(
						'key'   => 'field_alify_about_story_title',
						'label' => 'Story Title',
						'name'  => 'about_story_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_about_story_p1',
						'label' => 'Story Paragraph 1',
						'name'  => 'about_story_p1',
						'type'  => 'textarea',
						'rows'  => 4,
					),
					array(
						'key'   => 'field_alify_about_story_p2',
						'label' => 'Story Paragraph 2',
						'name'  => 'about_story_p2',
						'type'  => 'textarea',
						'rows'  => 4,
					),
					array(
						'key'   => 'field_alify_about_values_title',
						'label' => 'Values Section Title',
						'name'  => 'about_values_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_about_timeline_title',
						'label' => 'Timeline Section Title',
						'name'  => 'about_timeline_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_about_team_title',
						'label' => 'Team Section Title',
						'name'  => 'about_team_title',
						'type'  => 'text',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'page_template',
							'operator' => '==',
							'value'    => 'page-about.php',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);

		/* -----------------------------------------------------------
		 * Contact page (page-contact.php).
		 * ----------------------------------------------------------- */
		acf_add_local_field_group(
			array(
				'key'                   => 'group_alify_contact',
				'title'                 => 'Contact Page Content',
				'fields'                => array(
					array(
						'key'   => 'field_alify_contact_hero_title',
						'label' => 'Hero Title',
						'name'  => 'contact_hero_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_contact_global_title',
						'label' => 'Global Section Title',
						'name'  => 'contact_global_title',
						'type'  => 'text',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'page_template',
							'operator' => '==',
							'value'    => 'page-contact.php',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);

		/* -----------------------------------------------------------
		 * Services + Industries: "What's Included" features.
		 * ----------------------------------------------------------- */
		acf_add_local_field_group(
			array(
				'key'                   => 'group_alify_services',
				'title'                 => 'Service / Industry Options',
				'fields'                => array(
					array(
						'key'          => 'field_alify_svc_features',
						'label'        => 'What’s Included',
						'name'         => 'features',
						'type'         => 'repeater',
						'layout'       => 'block',
						'button_label' => 'Add feature',
						'sub_fields'   => array(
							array(
								'key'   => 'field_alify_svc_features_item',
								'label' => 'Feature',
								'name'  => 'feature',
								'type'  => 'text',
							),
						),
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'services',
						),
					),
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'industries',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);

		/* -----------------------------------------------------------
		 * Project: stats, gallery and sticky meta.
		 * ----------------------------------------------------------- */
		acf_add_local_field_group(
			array(
				'key'                   => 'group_alify_project',
				'title'                 => 'Project Options',
				'fields'                => array(
					array(
						'key'          => 'field_alify_project_stats',
						'label'        => 'Project Stats',
						'name'         => 'project_stats',
						'type'         => 'repeater',
						'layout'       => 'block',
						'button_label' => 'Add stat',
						'sub_fields'   => array(
							array(
								'key'   => 'field_alify_project_stats_value',
								'label' => 'Value',
								'name'  => 'value',
								'type'  => 'text',
							),
							array(
								'key'   => 'field_alify_project_stats_label',
								'label' => 'Label',
								'name'  => 'label',
								'type'  => 'text',
							),
						),
					),
					array(
						'key'          => 'field_alify_project_gallery',
						'label'        => 'Gallery',
						'name'         => 'gallery',
						'type'         => 'gallery',
						'return_format' => 'array',
						'preview_size' => 'medium',
						'library'      => 'all',
						'button_label' => 'Add images',
						'insert'       => 'append',
					),
					array(
						'key'   => 'field_alify_project_meta_tab',
						'label' => 'Project Meta',
						'name'  => '',
						'type'  => 'tab',
					),
					array(
						'key'   => 'field_alify_project_client',
						'label' => 'Client',
						'name'  => 'client',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_project_industry',
						'label' => 'Industry',
						'name'  => 'industry',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_project_services_list',
						'label' => 'Services List',
						'name'  => 'services_list',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_project_year',
						'label' => 'Year',
						'name'  => 'year',
						'type'  => 'text',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'project',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);

		/* -----------------------------------------------------------
		 * Case Studies: headline stat + client.
		 * ----------------------------------------------------------- */
		acf_add_local_field_group(
			array(
				'key'                   => 'group_alify_case_studies',
				'title'                 => 'Case Study Options',
				'fields'                => array(
					array(
						'key'   => 'field_alify_case_stat',
						'label' => 'Headline Stat',
						'name'  => 'case_stat',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_case_stat_note',
						'label' => 'Headline Stat Note',
						'name'  => 'case_stat_note',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_case_client',
						'label' => 'Client',
						'name'  => 'client',
						'type'  => 'text',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'case_studies',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);

		/* -----------------------------------------------------------
		 * Pricing: plan card fields.
		 * ----------------------------------------------------------- */
		acf_add_local_field_group(
			array(
				'key'                   => 'group_alify_pricing',
				'title'                 => 'Pricing Plan Options',
				'fields'                => array(
					array(
						'key'   => 'field_alify_price_amount',
						'label' => 'Price',
						'name'  => 'price',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_alify_price_note',
						'label' => 'Price Note',
						'name'  => 'price_note',
						'type'  => 'text',
					),
					array(
						'key'          => 'field_alify_price_features',
						'label'        => 'Features',
						'name'         => 'features',
						'type'         => 'repeater',
						'layout'       => 'block',
						'button_label' => 'Add feature',
						'sub_fields'   => array(
							array(
								'key'   => 'field_alify_price_features_item',
								'label' => 'Feature',
								'name'  => 'feature',
								'type'  => 'text',
							),
						),
					),
					array(
						'key'            => 'field_alify_price_highlight',
						'label'          => 'Highlight Plan',
						'name'           => 'plan_highlight',
						'type'           => 'true_false',
						'ui'             => 1,
						'default_value'  => 0,
					),
					array(
						'key'   => 'field_alify_price_badge',
						'label' => 'Badge Text',
						'name'  => 'pricing_badge',
						'type'  => 'text',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'pricing',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);

		/* -----------------------------------------------------------
		 * Teams: role.
		 * ----------------------------------------------------------- */
		acf_add_local_field_group(
			array(
				'key'                   => 'group_alify_teams',
				'title'                 => 'Team Member Options',
				'fields'                => array(
					array(
						'key'   => 'field_alify_team_role',
						'label' => 'Role',
						'name'  => 'role',
						'type'  => 'text',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'teams',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);

		/* -----------------------------------------------------------
		 * Testimonials: author role.
		 * ----------------------------------------------------------- */
		acf_add_local_field_group(
			array(
				'key'                   => 'group_alify_testimonials',
				'title'                 => 'Testimonial Options',
				'fields'                => array(
					array(
						'key'   => 'field_alify_testimonial_role',
						'label' => 'Author Role',
						'name'  => 'author_role',
						'type'  => 'text',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'testimonials',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);
	}
	add_action( 'acf/init', 'alify_acf_init' );
}
