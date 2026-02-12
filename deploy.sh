#!/bin/bash

# --- PROFESSIONAL LARAVEL DEPLOYMENT SCRIPT FOR CPANEL ---
# Author: Antigravity AI
# Version: 1.0.0

set -e

# --- Configuration ---
PROJECT_PATH=$(pwd)
PHP_PATH="/usr/local/bin/php" # Adjust this to your cPanel PHP path if needed (e.g., /usr/local/bin/ea-php82)
COMPOSER_PATH="composer"
NPM_PATH="npm"

# Colors for output
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# --- Helper Functions ---
print_status() {
    echo -e "${BLUE}[DEPLOYMENT]${NC} $1"
}

print_success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# --- Check Prerequisites ---
if ! command -v $COMPOSER_PATH &> /dev/null; then
    print_error "Composer could not be found. Please check your PHP/Composer installation."
    exit 1
fi

if ! command -v $NPM_PATH &> /dev/null; then
    print_error "NPM could not be found. Please check your Node.js installation."
    exit 1
fi

# --- Deployment Steps ---

echo -e "${BLUE}==============================================${NC}"
echo -e "${BLUE}   STARTING PRODUCTION DEPLOYMENT             ${NC}"
echo -e "${BLUE}==============================================${NC}"

# 1. Put into Maintenance Mode
print_status "Entering maintenance mode..."
$PHP_PATH artisan down || print_warning "Artisan down failed. Possibly already in maintenance mode."

# 2. Update Composer Dependencies
print_status "Installing/Updating Composer dependencies..."
$COMPOSER_PATH install --no-dev --optimize-autoloader --no-interaction --quiet

# 3. Handle Environment File
if [ ! -f ".env" ]; then
    print_warning ".env file not found. Copying .env.example..."
    cp .env.example .env
    $PHP_PATH artisan key:generate
fi

# 4. Build Assets using Vite
print_status "Installing NPM dependencies and building assets..."
$NPM_PATH install
$NPM_PATH run build

# 5. Run Database Migrations
print_status "Running database migrations..."
$PHP_PATH artisan migrate --force

# 6. Optimize Laravel (Caching)
print_status "Optimizing Laravel configuration and routes..."
$PHP_PATH artisan config:cache
$PHP_PATH artisan route:cache
$PHP_PATH artisan view:cache
$PHP_PATH artisan event:cache

# 7. Setup Storage Link
print_status "Creating storage symbolic link..."
$PHP_PATH artisan storage:link || print_warning "Storage link already exists."

# 8. Set Permissions (Adjust based on cPanel user group)
print_status "Setting folder permissions..."
find bootstrap/cache -type d -exec chmod 775 {} \;
find bootstrap/cache -type f -exec chmod 664 {} \;
find storage -type d -exec chmod 775 {} \;
find storage -type f -exec chmod 664 {} \;

# 9. Clean up
print_status "Cleaning up caches..."
$PHP_PATH artisan cache:clear

# 10. Exit Maintenance Mode
print_status "Exiting maintenance mode..."
$PHP_PATH artisan up

echo -e "${GREEN}==============================================${NC}"
echo -e "${GREEN}   DEPLOYMENT COMPLETED SUCCESSFULLY         ${NC}"
echo -e "${GREEN}==============================================${NC}"
echo -e "${YELLOW}Note: If this is cPanel, ensure your Domain root points to the 'public' folder.${NC}"
echo -e "${YELLOW}If you cannot change the DocumentRoot, create a symlink: ln -s $(pwd)/public public_html${NC}"
