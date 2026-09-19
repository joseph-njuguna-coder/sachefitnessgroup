FROM php:8.2-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Change Apache listening port to 10000 for Render
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html/
EXPOSE 10000
