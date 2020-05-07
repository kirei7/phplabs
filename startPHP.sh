docker build --tag myphpserver ./server
docker run -d -p 80:80 --link mysqldb --name my-apache-php-app --rm -v "$PWD":/var/www/html myphpserver
