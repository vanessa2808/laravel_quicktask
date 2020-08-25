FROM nimmis/apache-php7

# Replace sh with bash instead
RUN rm /bin/sh && ln -s /bin/bash /bin/sh

# Add repository ondrej/php
RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
RUN apt-get update --fix-missing

# Upgrade PHP 7.2
RUN apt-get install php7.2 php7.2-curl php7.2-xml php7.2-cli php7.2-common php7.2-json php7.2-mysql php7.2-mbstring php7.2-zip php7.2-soap libapache2-mod-php7.2 -y php7.2-gd

ADD php/php.ini /etc/php/7.2/apache2/php.ini
ADD php/php_cli.ini /etc/php/7.2/cli/php.ini

# Enable Apache2 Modules
RUN a2dismod php7.0
RUN a2enmod php7.2
RUN a2enmod rewrite
RUN a2enmod headers
RUN service apache2 restart

# Install git
RUN apt-get install -y git


# Create User
ARG APP_USER=demo
ARG PUID=1000
ARG PGID=1000

ENV PUID ${PUID}
ENV PGID ${PGID}
ENV APP_USER ${APP_USER}

RUN groupadd --gid ${PGID} ${APP_USER} && \
  useradd --uid ${PUID} --gid ${APP_USER} --shell /bin/bash --create-home ${APP_USER} && \
  echo "${APP_USER} ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers

# Set permission for APP_USER
RUN chown -R ${APP_USER}:${APP_USER} /var/www/html

ENV HOME /home/${APP_USER}

RUN service apache2 restart

WORKDIR /var/www/html/
