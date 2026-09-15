# Portfolio (static-export)

This repository contains a PHP-based portfolio migrated to static data. To deploy to GitHub and create a demo on Vercel, follow these steps.

1) Prepare local repo and push to GitHub

```bash
cd /path/to/portfolio
git init
git add .
git commit -m "Initial static-export portfolio"
# create a repo on GitHub and then:
git remote add origin git@github.com:YOUR_USERNAME/YOUR_REPO.git
git branch -M main
git push -u origin main
```

2) Create static build (locally)

```bash
php export.php
# open dist/index.html in a browser to verify
```

3) Deploy to Vercel

- In Vercel, create a new project and import your GitHub repository.
- Set the **Build Command** to:

```
php export.php
```

- Set the **Output Directory** to:

```
dist
```

This runs `export.php` during the build to generate `dist/` and Vercel will serve the static files.

Notes
- The site was converted to use file-based static data (`data/portfolio_data.php`).
- Some PHP-only endpoints (like admin) were removed. Download links are rewritten to point to files under `assets/files` in the static export.
