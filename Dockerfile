# Build frontend in a dedicated Node stage so we don't require npm in the PHP image
FROM node:18-slim AS node-build
WORKDIR /src

# Copy only package files first for caching
COPY package.json package-lock.json ./
# Skip optional native deps that often fail in CI (like tailwind native bindings)
RUN npm ci --omit=optional --silent --no-audit --no-fund

# Copy the rest and run the build
COPY . .
RUN npm run build --silent

# Final image (PHP + nginx) — no npm required here
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

# 3. Copy built frontend from the Node stage
COPY --from=node-build /src/public/build ./public/build

# 4. Create missing folders and set permissions as root
RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache public/build \
    && chown -R www-data:www-data storage bootstrap/cache public/build

# 5. SWITCH BACK TO WWW-DATA for security
USER www-data

# 6. Run Composer safely (ignoring scripts to save RAM)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

