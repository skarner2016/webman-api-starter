# 使用指定基础镜像
FROM php:8.2-fpm-bullseye

# 设置环境变量 DEBIAN_FRONTEND
ENV DEBIAN_FRONTEND noninteractive

# 安装必要的软件包和依赖项
RUN apt-get update \
    && cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

# 安装 sockets pcntl (laravel octane需要)
RUN docker-php-ext-install sockets pcntl

# 安装 git unzip (安装laravel需要)
RUN apt install git unzip -y

## 安装 swoole
#RUN pecl install swoole \
#    && docker-php-ext-enable swoole

# 安装 composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer