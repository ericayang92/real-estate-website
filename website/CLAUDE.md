# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Repository Overview

This repository contains WordPress files for the **Erica Yang Realtor** website running in a local Docker development environment.

**CRITICAL**: Work ONLY in the `ericayangrealtor/` directory. The root `website/` directory contains duplicate legacy WordPress core files that should be ignored.

## Production Server Access

**SSH Access**: `ssh myuglymo@162.241.253.108`
**Production Path**: `~/public_html/ericayangrealtor/`
**Database**: `myuglymo_WPWZG` (prefix: `wuc_`)
**Database Password**: `)E0L9R:zwFThK3hLP`

## Local Development Environment (Docker)

### Current Setup

The local environment uses Docker with the following configuration:

**Docker Compose File**: `/Users/ericayang/real-estate-website/docker-compose.yml`
**Local Site Path**: `/Users/ericayang/real-estate-website/website/ericayangrealtor/`
**Local URL**: `http://localhost:8080`

**Containers**:
- `wp_mysql` - MySQL 8.0 database (port 3306)
- `wp_wordpress` - WordPress with Apache (port 8080)
- `wp_phpmyadmin` - Database management (port 8081)

**Local Database Credentials**:
- Database: `wordpress_local`
- User: `wpuser`
- Password: `wppass`
- Host: `db:3306`
- Table Prefix: `wuc_`

### WordPress Configuration

**Site is Elementor-based**: Most content is stored in the database as post meta, not in theme files.

**Key WordPress Settings**:
- `WP_CACHE`: Should be `false` for local dev
- `WP_DEBUG`: `false` (set to `true` only when debugging)
- Table prefix: `wuc_` (NOT the standard `wp_`)

## Quick Setup from Scratch

If the local environment needs to be set up from scratch, follow these steps IN ORDER:

### 1. Stop and Clean Docker (if already running)

```bash
cd /Users/ericayang/real-estate-website
/Applications/Docker.app/Contents/Resources/bin/docker compose down
```

### 2. Download Fresh Copy from Production

**IMPORTANT**: Download the ENTIRE ericayangrealtor directory fresh. Do NOT use incremental sync as it can cause Elementor dependency issues.

```bash
# Remove old local copy
rm -rf /Users/ericayang/real-estate-website/website/ericayangrealtor

# Download complete fresh copy from production
rsync -avz -e "ssh -o StrictHostKeyChecking=no" \
  myuglymo@162.241.253.108:~/public_html/ericayangrealtor/ \
  /Users/ericayang/real-estate-website/website/ericayangrealtor/
```

**Why fresh download?**: Elementor has complex vendor dependencies that break with partial syncs. Always do a complete download.

### 3. Update wp-config.php for Local Database

Edit `/Users/ericayang/real-estate-website/website/ericayangrealtor/wp-config.php`:

```php
define('DB_NAME', 'wordpress_local');
define('DB_USER', 'wpuser');
define('DB_PASSWORD', 'wppass');
define('DB_HOST', 'db:3306');
```

Also set:
```php
define('WP_CACHE', false);
```

### 4. Disable HTTPS Redirect in .htaccess

Edit `/Users/ericayang/real-estate-website/website/ericayangrealtor/.htaccess` and comment out the HTTPS redirect (around line 43-47):

```apache
# <IfModule mod_rewrite.c>
# RewriteEngine On
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
# </IfModule>
```

### 5. Download Fresh Database from Production

```bash
ssh -o StrictHostKeyChecking=no myuglymo@162.241.253.108 \
  "mysqldump --no-tablespaces -u myuglymo_WPWZG -p')E0L9R:zwFThK3hLP' myuglymo_WPWZG 2>/dev/null" \
  > /Users/ericayang/real-estate-website/database_backup.sql
```

### 6. Start Docker Containers

```bash
cd /Users/ericayang/real-estate-website
/Applications/Docker.app/Contents/Resources/bin/docker compose up -d
```

Wait ~10 seconds for MySQL to fully start.

### 7. Import Database

```bash
/Applications/Docker.app/Contents/Resources/bin/docker exec -i wp_mysql \
  mysql -uwpuser -pwppass wordpress_local \
  < /Users/ericayang/real-estate-website/database_backup.sql
```

### 8. Update Site URLs in Database

```bash
/Applications/Docker.app/Contents/Resources/bin/docker exec -i wp_mysql \
  mysql -uwpuser -pwppass wordpress_local \
  -e "UPDATE wuc_options SET option_value = 'http://localhost:8080' WHERE option_name IN ('siteurl', 'home');"
```

### 9. Verify Site Works

```bash
curl -s http://localhost:8080/ | grep -o '<title>.*</title>'
```

Should return: `<title>Homepage - Erica Yang Realtor</title>`

**Access the site**: http://localhost:8080/

## Common Docker Commands

```bash
# Navigate to project directory
cd /Users/ericayang/real-estate-website

# Start containers
/Applications/Docker.app/Contents/Resources/bin/docker compose up -d

# Stop containers
/Applications/Docker.app/Contents/Resources/bin/docker compose down

# Restart containers
/Applications/Docker.app/Contents/Resources/bin/docker compose restart

# View WordPress logs
/Applications/Docker.app/Contents/Resources/bin/docker compose logs -f wordpress

# Check running containers
/Applications/Docker.app/Contents/Resources/bin/docker ps
```

## Syncing Changes from Production

**CRITICAL**: When syncing from production, ALWAYS do a complete fresh download of the entire `ericayangrealtor/` directory, NOT incremental syncs.

**Why?**: Elementor and other plugins have complex vendor dependencies that break with partial rsync. Using `--delete` flag or incremental syncs can cause "Class not found" errors.

**Correct way to sync**:

```bash
# 1. Stop Docker
/Applications/Docker.app/Contents/Resources/bin/docker compose down

# 2. Remove old directory
rm -rf /Users/ericayang/real-estate-website/website/ericayangrealtor

# 3. Download fresh complete copy
rsync -avz -e "ssh -o StrictHostKeyChecking=no" \
  myuglymo@162.241.253.108:~/public_html/ericayangrealtor/ \
  /Users/ericayang/real-estate-website/website/ericayangrealtor/

# 4. Update wp-config.php and .htaccess (see steps 3-4 above)

# 5. Download fresh database (see step 5 above)

# 6. Start Docker and import database (see steps 6-8 above)
```

## Installed Plugins

The site uses many plugins. Key ones:
- **elementor** & **elementor-pro-1**: Page builder (site is built with this)
- **seo-by-rank-math**: SEO plugin
- **litespeed-cache**: Performance caching
- **cmp-coming-soon-maintenance**: Maintenance mode
- **custom-fonts**: Font management
- **imagify**: Image optimization

**Total plugins directory size**: ~205MB

## Troubleshooting

### "Class not found" or Elementor errors

**Cause**: Incomplete plugin files, usually from incremental rsync.

**Solution**: Do a complete fresh download (see "Syncing Changes from Production" above).

### Site shows "Critical Error"

1. Enable debug mode in `wp-config.php`:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
ini_set('display_errors', 'On');
```

2. Check error: `curl -s http://localhost:8080/ | grep -i "fatal\|error"`

3. Common causes:
   - Missing Elementor dependencies → Fresh download needed
   - Database connection issue → Check wp-config.php
   - Wrong database credentials → Verify Docker is running

### Images Not Loading

**Cause**: uploads directory not synced.

**Solution**: The complete rsync includes uploads (~424MB). If images still missing, check:
```bash
ls -lh /Users/ericayang/real-estate-website/website/ericayangrealtor/wp-content/uploads/
```

### HTTPS Redirect Loop

**Cause**: .htaccess still has HTTPS redirect enabled.

**Solution**: Comment out lines 43-47 in `.htaccess` (see step 4 above).

## WordPress Admin Access

**URL**: http://localhost:8080/wp-admin/
**Credentials**: Use the same credentials as production (not stored in this file for security)

## Database Access (phpMyAdmin)

**URL**: http://localhost:8081/
**Server**: db
**Username**: wpuser
**Password**: wppass
**Database**: wordpress_local

## Critical Reminders

1. **ALWAYS do complete fresh downloads** - Never use incremental sync or --delete flag
2. **Database prefix is `wuc_`** not `wp_`
3. **Update wp-config.php AND .htaccess** after every fresh download
4. **Site is Elementor-based** - Content is in database, not templates
5. **Docker must be running** for site to work
6. **Use http:// NOT https://** for localhost
