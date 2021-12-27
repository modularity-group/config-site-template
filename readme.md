# config-site-template 

This module builds on WordPress and Modularity.

Renders the frontend with header, footer, page, blog, post, search & 404.

---

Version: 2.0.1

Authors: Ben & Matze @ https://modularity.group

License: MIT

---

Just add `<?php do_action('modularity');` to your theme's `index.php`.

You may customize the output with the actions defined in `config-site-template.php`.

---

2.0.1 | add body_class() and post_class() to container markup elements 

2.0.0 | rewrite for full hookability, remove most modularity hooks

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
