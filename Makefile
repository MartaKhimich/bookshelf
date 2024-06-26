up: docker-up
down: docker-down
init: docker-down-clear docker-pull docker-build docker-up app-init

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

migrate:
	docker-compose run --rm php-cli php artisan migrate

chmod:
	docker-compose run --rm php-cli chmod 777 . -R

clear:
	docker-compose run --rm php-cli php artisan optimize:clear

test:
	docker-compose run --rm php-cli php artisan test

app-init:
	docker-compose run --rm php-cli composer install
	docker-compose run --rm php-cli chown root:www-data -R storage/
	docker-compose run --rm php-cli chmod 777 -R storage/
	docker-compose run --rm php-cli cp .env.example .env
	docker-compose run --rm php-cli php artisan key:generate
	docker-compose run --rm php-cli php artisan migrate --seed

postman:
	docker-compose run --rm php-cli php artisan dev:postman api 1

db:
	docker-compose run --rm php-cli php artisan migrate:fresh --seed

