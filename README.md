# Erica Yang Realtor Website

Local development environment for the Erica Yang Realtor WordPress website.

## Quick Start

**Important**: Read `CLAUDE.md` for detailed setup instructions.

### Prerequisites

- Docker Desktop installed and running
- SSH access to production server

### Setup

```bash
# 1. Clone this repository
git clone <your-repo-url>
cd real-estate-website

# 2. Follow the complete setup guide in CLAUDE.md
# The quick version:
# - Download site files from production
# - Update wp-config.php (copy from wp-config-sample-local.php)
# - Disable HTTPS redirect in .htaccess
# - Start Docker
# - Import database
# - Update URLs

# 3. Access your site
open http://localhost:8080
```

### What's Tracked in Git

✅ **DO track**:
- Documentation (CLAUDE.md, SETUP_GUIDE.md, this README)
- Docker configuration (docker-compose.yml)
- Custom themes (if you create any)
- .htaccess (with local modifications)
- Configuration templates (wp-config-sample-local.php)

❌ **DON'T track**:
- WordPress core files (wp-admin, wp-includes, wp-*.php)
- wp-config.php (contains sensitive credentials)
- Uploads directory (too large)
- Database backups (.sql files)
- Plugins (downloaded from production)
- Cache files

### Important Files

- `CLAUDE.md` - Complete setup and development guide
- `SETUP_GUIDE.md` - Step-by-step setup for non-technical users
- `docker-compose.yml` - Docker environment configuration
- `website/ericayangrealtor/` - WordPress installation directory

### Common Commands

```bash
# Start development environment
cd /Users/ericayang/real-estate-website
/Applications/Docker.app/Contents/Resources/bin/docker compose up -d

# Stop environment
/Applications/Docker.app/Contents/Resources/bin/docker compose down

# View logs
/Applications/Docker.app/Contents/Resources/bin/docker compose logs -f wordpress

# Access WordPress admin
open http://localhost:8080/wp-admin

# Access database management
open http://localhost:8081
```

### Getting Updates from Production

**Never use incremental sync!** Always do a complete fresh download. See CLAUDE.md for details.

```bash
# Stop Docker
docker compose down

# Remove old files
rm -rf website/ericayangrealtor

# Download fresh copy from production (see CLAUDE.md for full command)
```

### Project Structure

```
.
├── docker-compose.yml          # Docker configuration
├── README.md                   # This file
├── CLAUDE.md                   # Detailed guide for Claude Code
├── SETUP_GUIDE.md             # Setup guide for users
└── website/
    └── ericayangrealtor/      # WordPress site files
        ├── wp-content/        # Themes, plugins, uploads
        ├── .htaccess          # Apache configuration
        └── wp-config.php      # WordPress config (NOT in git)
```

### Troubleshooting

See the Troubleshooting section in `CLAUDE.md` for common issues and solutions.

### Security Notes

⚠️ **Never commit**:
- wp-config.php
- Database backups
- Any files with passwords or API keys

The .gitignore file is set up to prevent this, but always double-check before committing.

## Production Server

**Access**: SSH credentials in CLAUDE.md
**URL**: https://ericayangrealtor.com
**Hosting**: Managed WordPress hosting

## Local Environment

**URL**: http://localhost:8080
**Admin**: http://localhost:8080/wp-admin
**Database**: http://localhost:8081 (phpMyAdmin)

## Support

For detailed instructions and troubleshooting, see CLAUDE.md.
