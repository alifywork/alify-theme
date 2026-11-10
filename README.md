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
│   ├── template-tags.php # Posted on/by, entry footer, post thumbnail
│   ├── enqueue.php     # Styles + scripts
│   ├── customizer.php  # Customizer options (ALIFY Theme Options panel)
│   └── security.php    # Security hardening
└── assets/           # css, js, gsap, bootstrap, fonts, icons, images
```
