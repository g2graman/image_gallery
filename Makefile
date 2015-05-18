all: lint prettify

lint:
	@gulp lint

prettify: 
	@gulp prettify

.PHONY: lint prettify
