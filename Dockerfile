FROM php:8.3-fpm

WORKDIR /var/www/html

# 必要パッケージ
RUN apt-get update \
    && apt-get install -y libonig-dev git unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring \
    && rm -rf /var/lib/apt/lists/*

# Composerインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# アプリケーションのコードをコピー
COPY ./backend /var/www/html

# vendor作成
RUN composer install