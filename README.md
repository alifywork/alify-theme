# alify-theme

ALIFY — WordPress theme.

## Development rules (mandatory)

1. **No dumping-yard files** — one concern per file. Every feature gets its own
   file, and all files live inside proper folders (`inc/` for PHP modules,
   `assets/` for static files, `template-parts/` for reusable template chunks).
2. **Security first** — every line of code must be safe against hacking,
   malware and injection:
   - Escape ALL output: `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`.
   - Sanitize ALL input: `sanitize_text_field()`, `absint()` (after `wp_unslash()`).
   - Every form / admin action: nonce (`wp_nonce_field` / `check_admin_referer`)
     AND capability check (`current_user_can()`).
   - Database access only via `$wpdb->prepare()` — never raw SQL.
   - Every PHP file starts with `defined( 'ABSPATH' ) || exit;`.
   - Hardening rules live in `inc/security.php` only.

## Project guidelines (entire development phase)

1. **Gutenberg is disabled** — Classic Editor everywhere (posts, pages, CPTs)
   and the classic widgets screen (`inc/editor.php`). Do not add block-editor
   code or block-specific theme supports.
2. **No page builders.** Pages are built with **ACF Pro**: page sections and
   the fields inside them. Always escape ACF output —
   `esc_html( get_field( 'x' ) )`, `esc_url( get_field( 'x' ) )`,
   `wp_kses_post( get_field( 'x' ) )` — never raw `the_field()`.
3. **Bootstrap is grid-only.** Use only `container` / `container-fluid`, `row`
   and `col-*` (inside a plain `<section>`). ALL other CSS is custom and lives
   in per-section files.
4. **GSAP** is the animation engine: ScrollSmoother for smooth scrolling,
   scroll-triggered text/section reveals, light parallax — only where needed.
5. **Icons: Font Awesome** (`assets/icons`).
6. **One section = one CSS file + one JS file.** Each section's CSS (including
   its responsive rules) and JS live in their own files, organized under
   `assets/css/sections/` and `assets/js/sections/` — never dump section code
   into `style.css` / `main.js`.
7. **Data mostly comes from CPTs.** The same data renders per context:
   cards/grids on archive pages, sliders/tabs/stacks on the home page. Query
   and template code must be written per section/use-case, not one-size-fits-all.
8. **Blog uses WordPress's default Posts** (the built-in post type — no custom
   post type for blogs): blog listing `home.php`, blog single `single-post.php`.

## Structure

```
alify-theme/
├── style.css         # Theme header only (real styles: assets/css/style.css)
├── functions.php     # Bootstrap/loader only (no logic)
├── index.php         # Main template (fallback for all views)
├── header.php        # Header template
├── footer.php        # Footer template
├── sidebar.php       # Widget area template
├── comments.php      # Comments template
├── searchform.php    # Search form (escaped output)
├── page.php          # Static pages
├── single.php        # Single posts
├── search.php        # Search results
├── 404.php           # Not-found page
├── inc/              # PHP modules — one concern per file
│   ├── setup.php       # Theme supports (title-tag, thumbnails, logo, html5, editor-styles…)
│   ├── menus.php       # Menu locations (primary, mobile, footer, social)
│   ├── widgets.php     # Widget areas (main sidebar + 4 footer columns)
│   ├── image-sizes.php # Custom image sizes
│   ├── excerpts.php    # Excerpt length + read-more
│   ├── template-tags.php # Posted on/by, entry footer, terms, post thumbnail
│   ├── enqueue.php     # Styles + scripts
│   ├── customizer.php  # Customizer options (ALIFY Theme Options panel)
│   ├── security.php    # Security hardening
│   └── cpt/            # Custom post types — one file per CPT
│       ├── services.php     # Services (single+archive, no taxonomy)
│       ├── project.php      # Project (single+archive, + project_category)
│       ├── teams.php        # Teams (single+archive, + team_category)
│       ├── industries.php   # Industries (single+archive, + industry_category)
│       ├── case_studies.php # Case Studies (single+archive, + case_study_category)
│       ├── pricing.php      # Pricing (archive only, + pricing_category)
│       ├── faqs.php         # FAQs (archive only, + faq_category)
│       └── testimonials.php # Testimonials (archive only, + testimonial_category)
└── assets/           # css, js, gsap, bootstrap, fonts, icons, images
```

CPT templates at the root follow the WordPress template hierarchy:
`single-{cpt}.php` for Services / Project / Teams / Industries / Case Studies and
`archive-{cpt}.php` for all eight CPTs. Pricing, FAQs and Testimonials are
archive-only: their single URLs 301-redirect to the archive.

## URL structure (SEO: category names in URLs, no machine slugs)

| Content  | Single URL              | Archive        | Category URL                 |
|----------|-------------------------|----------------|------------------------------|
| Services | `/services/{service}/`  | `/services/`   | —                            |
| Project  | `/project/{project}/`   | `/projects/`   | `/projects/{category}/`      |
| Teams    | `/team/{member}/`       | `/teams/`      | `/teams/{category}/`         |
| Industries | `/industry/{item}/`   | `/industries/` | `/industries/{category}/`    |
| Case Studies | `/case-study/{study}/` | `/case-studies/` | `/case-studies/{category}/` |
| Pricing  | none (301 to archive)   | `/pricing/`    | `/pricing/{category}/`       |
| FAQs     | none (301 to archive)   | `/faqs/`       | `/faqs/{category}/`          |
| Testimonials | none (301 to archive) | `/testimonials/` | `/testimonials/{category}/` |

Taxonomy identifiers (`project_category` etc.) never appear in URLs — category
pages always show the category's own slug. Singles and category archives use
distinct base segments so rewrite rules can never collide.
