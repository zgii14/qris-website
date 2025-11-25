# =========================
# STAGE 1 – BUILD FRONTEND
# =========================
FROM node:20-alpine AS frontend

WORKDIR /app

# copy file yang dibutuhkan untuk npm install
COPY package.json package-lock.json* pnpm-lock.yaml* yarn.lock* ./
RUN \
  if [ -f package-lock.json ]; then npm ci; \
  elif [ -f yarn.lock ]; then yarn install --frozen-lockfile; \
  else npm install; \
  fi

# copy source yang perlu untuk build Vite
COPY vite.config.* postcss.config.* tailwind.config.* . 2>/dev/null || true
COPY resources ./resources
COPY public ./public

# build assets Vite -> public/build
RUN npm run build


# =========================
# STAGE 2 – PHP + LARAVEL
# =========================
FROM php:8.2-cli-alpine

# deps sistem & ekstensi PHP
RUN apk add --no-cache \
      bash git curl libpng-dev oniguruma-dev libxml2-dev zip unzip \
      icu-dev libzip-dev mariadb-connector-c-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath intl zip

# composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# copy semua source Laravel
COPY . .

# copy hasil build Vite dari stage 1
COPY --from=frontend /app/public/build ./public/build

# install dependency PHP (tanpa dev)
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# permission storage & cache (kalau mau pakai www-data bisa diganti)
RUN mkdir -p storage framework/cache bootstrap/cache \
  && chown -R www-data:www-data storage bootstrap/cache

# PORT yang dipakai php artisan serve
EXPOSE 8000

# Jalankan Laravel dev server (cukup buat hobby deployment)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
