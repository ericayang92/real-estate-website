# Local Development Setup Guide
## Erica Yang Realtor Website

This guide will help you set up a local development environment for your website on your laptop.

---

## Prerequisites

1. **Install Docker Desktop**
   - Download from: https://www.docker.com/products/docker-desktop
   - Install and start Docker Desktop
   - Make sure Docker is running (you'll see the Docker icon in your menu bar)

---

## Setup Steps

### Step 1: Get the Website Files

You'll need to get a copy of the `wordpress-myuglymonkey` folder that contains:
- The `ericayangrealtor` directory (your website files)
- The `database_erica.sql` file (your website database backup)
- A `docker-compose.yml` file (configuration for local development)

Place this folder somewhere easy to access, like your Desktop or Documents folder.

### Step 2: Create the Docker Configuration File

Inside the `wordpress-myuglymonkey` folder, create a file named `docker-compose.yml` with this content:

```yaml
version: '3.8'

services:
  db:
    image: mysql:8.0
    container_name: wp_mysql
    restart: always
    environment:
      MYSQL_DATABASE: wordpress_local
      MYSQL_USER: wpuser
      MYSQL_PASSWORD: wppass
      MYSQL_ROOT_PASSWORD: rootpass
    volumes:
      - db_data:/var/lib/mysql
    ports:
      - "3306:3306"

  wordpress:
    image: wordpress:latest
    container_name: wp_wordpress
    restart: always
    depends_on:
      - db
    ports:
      - "8080:80"
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: wpuser
      WORDPRESS_DB_PASSWORD: wppass
      WORDPRESS_DB_NAME: wordpress_local
    volumes:
      - ./ericayangrealtor:/var/www/html

  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    container_name: wp_phpmyadmin
    restart: always
    depends_on:
      - db
    ports:
      - "8081:80"
    environment:
      PMA_HOST: db
      MYSQL_ROOT_PASSWORD: rootpass

volumes:
  db_data:
```

### Step 3: Update WordPress Configuration

Open the file `ericayangrealtor/wp-config.php` and find these lines near the top:

```php
define('DB_NAME', 'erica_local');  // or whatever database name is there
define('DB_USER', 'wpuser');
define('DB_PASSWORD', 'wppass');
define('DB_HOST', 'db:3306');
```

Make sure they match exactly:
- `DB_NAME` should be `wordpress_local`
- `DB_USER` should be `wpuser`
- `DB_PASSWORD` should be `wppass`
- `DB_HOST` should be `db:3306`

### Step 4: Disable HTTPS Redirect for Local Development

Open the file `ericayangrealtor/.htaccess` and find this section:

```apache
# BEGIN HTTPS Forced Redirect
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>
# END HTTPS Forced Redirect
```

Comment it out by adding `#` at the start of each line (except the BEGIN/END comments):

```apache
# BEGIN HTTPS Forced Redirect - DISABLED FOR LOCAL DEV
# <IfModule mod_rewrite.c>
# RewriteEngine On
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
# </IfModule>
# END HTTPS Forced Redirect - DISABLED FOR LOCAL DEV
```

⚠️ **Important:** This change is ONLY for local development. Don't push this to your live website!

### Step 5: Start the Development Environment

Open **Terminal** (on Mac) or **Command Prompt** (on Windows) and run:

```bash
cd /path/to/wordpress-myuglymonkey
docker-compose up -d
```

Replace `/path/to/wordpress-myuglymonkey` with the actual path to your folder.

This will download and start all the necessary containers. It may take a few minutes the first time.

### Step 6: Import Your Database

Once the containers are running, import your database:

```bash
docker exec -i wp_mysql mysql -uwpuser -pwppass wordpress_local < database_erica.sql
```

Wait about 10-15 seconds for the import to complete.

### Step 7: Access Your Website

Open your browser and go to:

```
http://localhost:8080/
```

**Important:** Use `http://` NOT `https://`

### Step 8: Clear Browser Cache (if needed)

If Chrome automatically redirects to `https://` and shows an error:

1. Open a new tab and go to: `chrome://net-internals/#hsts`
2. Scroll down to "Delete domain security policies"
3. Type `localhost` and click "Delete"
4. Try accessing `http://localhost:8080/` again

OR simply use an **Incognito window** (Cmd+Shift+N on Mac, Ctrl+Shift+N on Windows)

---

## Useful Commands

**Start the development environment:**
```bash
docker-compose up -d
```

**Stop the development environment:**
```bash
docker-compose down
```

**View logs (if something isn't working):**
```bash
docker-compose logs
```

**Check if containers are running:**
```bash
docker ps
```

---

## Accessing Different Tools

- **Your Website:** http://localhost:8080/
- **Database Management (phpMyAdmin):** http://localhost:8081/
  - Username: `wpuser`
  - Password: `wppass`

---

## Troubleshooting

### Problem: "This site can't provide a secure connection" or SSL error
**Solution:** Make sure you're using `http://` not `https://`, and clear your browser's HSTS cache (see Step 8)

### Problem: "Database connection error"
**Solution:** 
1. Make sure Docker is running
2. Check that `wp-config.php` has the correct database settings (see Step 3)
3. Make sure you imported the database (see Step 6)

### Problem: Containers won't start
**Solution:**
1. Make sure Docker Desktop is running
2. Try stopping and restarting: `docker-compose down` then `docker-compose up -d`
3. Check if ports 8080 or 3306 are already in use by another application

### Problem: Changes to files aren't showing up
**Solution:** 
1. Hard refresh your browser (Cmd+Shift+R on Mac, Ctrl+Shift+R on Windows)
2. Clear your browser cache
3. Restart the containers: `docker-compose restart`

---

## Getting Help

If you run into issues:
1. Check the logs: `docker-compose logs`
2. Ask Claude for help - share any error messages you're seeing
3. Make sure all the files are in the right places

---

## When You're Done Working

To stop the development environment and free up resources:

```bash
cd /path/to/wordpress-myuglymonkey
docker-compose down
```

Your work will be saved. When you want to work again, just run `docker-compose up -d` to start it back up!
