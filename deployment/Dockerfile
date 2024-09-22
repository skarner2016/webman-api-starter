# 使用指定基础镜像
FROM php:7.4-fpm-bullseye

# 设置环境变量 DEBIAN_FRONTEND
ENV DEBIAN_FRONTEND noninteractive

COPY www.conf.ini /usr/local/etc/php-fpm.d/www.conf

# 安装必要的软件包和依赖项
RUN apt-get update \
    && cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

RUN docker-php-ext-install pcntl bcmath mysqli pdo_mysql \
    && docker-php-ext-enable pcntl bcmath mysqli

# 安装 git unzip (安装laravel需要)
RUN apt install git unzip -y

RUN pecl install redis \
	&& docker-php-ext-enable redis

RUN apt install -y redis-server redis-tools \
    && /etc/init.d/redis-server start
# 安装 composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 安装 Zsh 和 Oh My Zsh，并将 Zsh 设置为默认的 Shell
RUN apt install -y zsh \
    && chsh -s /bin/zsh \
    && sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)" "" --unattended \
    && sed -i 's/\/bin\/bash/\/bin\/zsh/g' /etc/passwd

# 为根用户安装 Oh My Zsh 并将 Zsh 设置为默认的 Shell
RUN mkdir -p /root/.oh-my-zsh/custom/plugins \
    && git clone https://github.com/zsh-users/zsh-syntax-highlighting.git /root/.oh-my-zsh/custom/plugins/zsh-syntax-highlighting \
    && git clone https://github.com/zsh-users/zsh-autosuggestions /root/.oh-my-zsh/custom/plugins/zsh-autosuggestions \
    && sed -i 's/plugins=(git)/plugins=(git zsh-syntax-highlighting zsh-autosuggestions)/' /root/.zshrc

# 设置默认启动目录
WORKDIR /var/www