FROM php:8.3-fpm

# 必要なパッケージ（onigurumaなど）をインストール
RUN apt-get update \
    && apt-get install -y libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring

# Composerも入れる（最新版）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer