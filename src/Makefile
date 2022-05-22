create-project:
	mkdir -p src
	@make build
	@make up
	@make laravel-install
	php artisan key:generate
	php artisan storage:link
	chmod -R 777 storage bootstrap/cache
	@make fresh
install-recommend-packages:
	composer require doctrine/dbal
	composer require --dev ucan-lab/laravel-dacapo
	composer require --dev barryvdh/laravel-ide-helper
	composer require --dev beyondcode/laravel-dump-server
	composer require --dev barryvdh/laravel-debugbar
	composer require --dev roave/security-advisories:dev-master
	php artisan vendor:publish --provider="BeyondCode\DumpServer\DumpServerServiceProvider"
	php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
init:
	docker compose up -d --build
	composer install
	cp .env.example .env
	php artisan key:generate
	php artisan storage:link
	chmod -R 777 storage bootstrap/cache
	@make fresh
migrate:
	php artisan migrate
fresh:
	php artisan migrate:fresh --seed
refresh:
	php artisan migrate:refresh --seed
seed:
	php artisan db:seed
dacapo:
	php artisan dacapo
tinker:
	php artisan tinker
test:
	php artisan test
optimize:
	php artisan optimize
optimize-clear:
	php artisan optimize:clear
cache:
	composer dump-autoload
	php artisan clear-compiled
	@make optimize
	@make optimize-clear
	php artisan event:cache
	php artisan view:cache
	@make cache-clear
cache-clear:
	composer clear-cache
	@make optimize-clear
	php artisan event:clear
route:
	php artisan route:list
