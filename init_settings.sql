CREATE DATABASE itdept_test;
CREATE USER 'itdept_test'@'localhost' IDENTIFIED BY 'rawitdept';
USE itdept_test;

GRANT ALL privileges on itdept_test.* to 'itdept_test'@'localhost' identified by 'rawitdept';
FLUSH PRIVILEGES;