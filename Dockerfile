# Build frontend in a dedicated Node stage so we don't require npm in the PHP image
FROM serversideup/php:8.4-fpm-nginx

# Environment variables for Render
ENV AUTOCONF_PHPFPM_ROOT=/var/www/html/public
ENV AUTORUN_LARAVEL_MIGRATION=true
ENV AUTORUN_LARAVEL_STORAGE_LINK=true
ENV AUTORUN_LARAVEL_OPTIMIZE=true

# 1. SWITCH TO ROOT to handle system-level permissions
USER root

WORKDIR /var/www/html

# 2. Copy code and assign ownership directly to the web user
COPY --chown=www-data:www-data . .

# 3. Ensure built frontend exists (we commit `public/build` to repo for free-tier deploys)
RUN test -d public/build || echo "Warning: public/build not found; ensure assets are built and committed"

# 3b. Ensure SQLite file exists so Laravel can open the DB (required when using sqlite)
RUN mkdir -p database && touch database/database.sqlite && chmod 664 database/database.sqlite && chown www-data:www-data database/database.sqlite || true

# 4. Create missing folders and set permissions as root
RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache public/build || true \
    && chown -R www-data:www-data storage bootstrap/cache public/build || true

# 5. SWITCH BACK TO WWW-DATA for security
USER www-data

# 6. Run Composer safely (ignoring scripts to save RAM)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts || true

