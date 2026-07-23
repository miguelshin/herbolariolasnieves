# AGENTS.md

## What This Is

Static HTML + PHP site for "Herbolario Las Nieves" (herbal shop, Las Gabias, Granada). Based on the Start Bootstrap Freelancer template. Single-page HTML with Bootstrap 4, jQuery, SCSS, and a PHP contact form. **No build step needed to deploy** — all compiled/minified assets are already in the repo.

## Deployment

Deploys directly to IONOS shared hosting via file upload. There is no Node.js on the server. The files in `css/`, `js/`, and `vendor/` are the final deployable versions.

## Local Dev (optional)

If editing SCSS sources, use Gulp locally to recompile:

- `npm install` — install dependencies (one-time)
- `gulp dev` — BrowserSync dev server with live reload
- `gulp css` — compile SCSS → CSS + minify
- `gulp js` — minify JS
- `gulp vendor` — copy node_modules → vendor/
- `gulp` — build everything

**Gulp 3, not Gulp 4.** Task dependency syntax (`gulp.task('css:minify', ['css:compile'], ...)`) is Gulp 3 only. Do not upgrade without rewriting the gulpfile.

## Key Paths

- `index.html` — the single page (lang="es", all content is inline)
- `scss/` — SCSS source; entry point is `scss/freelancer.scss`
- `css/` — compiled CSS output (generated, do not edit directly)
- `js/` — JS source + minified versions
- `vendor/` — third-party libs copied from node_modules by `gulp vendor`
- `mail/contact_me.php` — PHP contact form (requires server-side PHP)
- `logs/` — **server access logs and traffic data from IONOS, do not modify or commit**

## Gotchas

- **No `.gitignore` exists.** The `logs/`, `vendor/`, and `node_modules/` directories are not excluded. Be cautious with `git add`.
- **README.md has unresolved merge conflicts** (git conflict markers). Fix before any publish.
- **No tests, no linting, no typecheck.** There is no verification step beyond checking the site renders correctly in a browser.
- All site content (text, images, sections) lives directly in `index.html`. There is no CMS, no data files, no templating engine.
- The site references external Google Fonts (Dancing Script, Montserrat, Lato) via CDN links.
