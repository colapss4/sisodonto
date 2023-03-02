-- create user and database for the application 
CREATE USER 'sisodonto'@'%' IDENTIFIED BY 'sisodonto!';
CREATE DATABASE IF NOT EXISTS `sisodonto`;
GRANT ALL PRIVILEGES ON sisodonto.* TO 'sisodonto'@'%';