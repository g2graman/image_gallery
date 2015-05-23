PORT=8080
ROOT_DB_USER='root'

all: lint fresh_run

lint:
	@gulp lint

prettify: 
	@gulp prettify

fresh_run: clean setup_db run

run: optimize
	php artisan serve --port=${PORT}

optimize:
	@php artisan optimize

init_db_settings:
	mysql -u ${ROOT_DB_USER} -p < init_settings.sql

setup_db:
	@php bin/composer.phar dump-autoload
	@php artisan migrate:refresh

clean:
	@rm -rf public/uploads/*
	@php artisan clear-compiled
	@php artisan cache:clear

.PHONY: lint prettify optimize run init_db_settings setup_db clean fresh_run
