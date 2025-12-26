# Use the official Nginx image as a base
FROM ubuntu:latest

RUN apt-get update && apt-get install -y apache2
RUN apt update -y
RUN apt install software-properties-common -y
# RUN apt update nano -y
RUN add-apt-repository ppa:ondrej/php -y
RUN apt update -y
RUN apt install php8.4 libapache2-mod-php8.4 php8.4-cli php8.4-common php8.4-fpm php8.4-mysql php8.4-gd php8.4-mbstring php8.4-zip -y
RUN apt install php-mysql php-curl -y
RUN apt install nano -y
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy your web project files into the Apache default web directory
COPY . /var/www/html

# RUN sudo chmod 755 -R /var/www/html

# Expose port 80 (Nginx default HTTP port)
EXPOSE 81

# Start ubuntu when the container launches
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
