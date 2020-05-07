# Ticketjoy simple database
# - requires ticketjoy.sql file

FROM mysql:latest

ENV MYSQL_DATABASE=serhii \
    MYSQL_ROOT_PASSWORD=password

ADD init.sql /docker-entrypoint-initdb.d

EXPOSE 3306
