install:
	composer install

brain-games:
	./bin/brain-games

validate:
	composer validat

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin