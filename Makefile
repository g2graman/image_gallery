PORT=8080

all: lint prettify

lint:
	@gulp lint

prettify: 
	@gulp prettify

run:
	php artisan serve --port=${PORT}

.PHONY: lint prettify
