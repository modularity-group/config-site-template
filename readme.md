# config-site-template [work in progress]

This module builds on WordPress and Modularity.

Renders the frontend HTML template with header, footer and all content types.

Just add `<?php do_action('modularity');` to your theme's `index.php`.

---

Version: 1.2.4

Authors: Ben & Matze @ https://modularity.group

License: MIT


## Details

Provides the following hooks:

```
modularity_document_start
modularity_doctype_start
modularity_head_start
modularity_head_title
modularity_head_after_title
modularity_head_end
modularity_body_start
modularity_template_header
modularity_main_menu
modularity_template_blog
modularity_template_home
modularity_template_blog
modularity_template_404
modularity_template_search
modularity_template_page
modularity_template_post
modularity_content_post
modularity_template_archive
modularity_template_date
modularity_template_other
modularity_content_before
modularity_content_after
modularity_template_footer
modularity_aside (tbd)
modularity_body_end
modularity_document_end
```


## Changelog

1.2.4 | hookable post template content

1.2.3 | check has_post_thumbnail in post template

1.2.2 | wrap search results list

1.2.1 | add content hooks, wrap post image, change single backlink to category

1.2.0 | wrap footer widgets

1.1.9 | add search results template

1.1.8 | add missing get_header and get_footer hooks for compatibility

1.1.7 | enable default footer widgets area 

1.1.6 | make wp_title hookable > rank math compatible

1.1.5 | switch head title output and improve wp_title() filtering-capabilities

1.1.4 | improve blog archive detection (MZ)

1.1.3 | improve blog author and date markup

1.1.2 | improve blog templates markup and config excerpts

1.1.1 | wrap header link with <figure>

1.1.0 | add wp_body_open(), add blog and post template, move sub-templates to folder, add title link

1.0.0 | remove `config_templates` support
