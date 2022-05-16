up:
	docker-compose up -d
build:
	docker-compose build --no-cache --force-rm
laravel-install:
	docker-compose exec app composer create-project --prefer-dist laravel/laravel .
project:
	@make build
	@make up
	@make laravel-install
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan storage:link
	docker-compose exec app chmod -R 777 storage bootstrap/cache
	@make fresh
nuxt-cors:
	docker-compose exec app php artisan vendor:publish --tag="cors"
install-recommend-packages:
	docker-compose exec app composer require doctrine/dbal "^2"
	docker-compose exec app composer require --dev fruitcake/laravelcors
	docker-compose exec app composer require --dev ucan-lab/laravel-dacapo
	docker-compose exec app composer require --dev barryvdh/laravel-ide-helper
	docker-compose exec app composer require --dev beyondcode/laravel-dump-server
	docker-compose exec app composer require --dev barryvdh/laravel-debugbar
	docker-compose exec app composer require --dev roave/security-advisories:dev-master
	docker-compose exec app php artisan vendor:publish --provider="BeyondCode\DumpServer\DumpServerServiceProvider"
	docker-compose exec app php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
init:
	docker-compose up -d --build
	docker-compose exec app composer install
	docker-compose exec app cp .env.example .env
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan storage:link
	docker-compose exec app chmod -R 777 storage bootstrap/cache
	@make fresh
remake:
	@make destroy
	@make init
stop:
	docker-compose stop
down:
	docker-compose down --remove-orphans
restart:
	@make down
	@make up
destroy:
	docker-compose down --rmi all --volumes --remove-orphans
destroy-volumes:
	docker-compose down --volumes --remove-orphans
ps:
	docker-compose ps
logs:
	docker-compose logs
logs-watch:
	docker-compose logs --follow
log-web:
	docker-compose logs web
log-web-watch:
	docker-compose logs --follow web
log-app:
	docker-compose logs app
log-app-watch:
	docker-compose logs --follow app
log-db:
	docker-compose logs db
log-db-watch:
	docker-compose logs --follow db
web:
	docker-compose exec web ash
app:
	docker-compose exec app sh
migrate:
	docker-compose exec app php artisan migrate
roll:
	docker-compose exec app php artisan migrate:rollback
fresh:
	docker-compose exec app php artisan migrate:fresh --seed
refresh:
	docker-compose exec app php artisan migrate:refresh --seed
seed:
	docker-compose exec app php artisan db:seed
dacapo:
	docker-compose exec app php artisan dacapo
rollback-test:
	docker-compose exec app php artisan migrate:fresh
	docker-compose exec app php artisan migrate:refresh
tinker:
	docker-compose exec app php artisan tinker
test:
	docker-compose exec app php artisan test
optimize:
	docker-compose exec app php artisan optimize
optimize-clear:
	docker-compose exec app php artisan optimize:clear
cache:
	docker-compose exec app composer dump-autoload -o
	@make optimize
	docker-compose exec app php artisan event:cache
	docker-compose exec app php artisan view:cache
	docker-compose exec app php artisan route:cache
	docker-compose exec app php artisan route:clear
cache-clear:
	docker-compose exec app composer clear-cache
	@make optimize-clear
	docker-compose exec app php artisan event:clear
# laravel sanctum (spa)
sanctum:
	docker-compose exec app composer require laravel/sanctum
	docker-compose exec app php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
	docker-compose exec app php artisan migrate:fresh
	docker-compose exec app php artisan make:controller API\\Auth\\LoginController
	docker-compose exec app php artisan make:controller API\\Auth\\RegisterController
	docker-compose exec app php artisan make:controller API\\Auth\\UserController
facebook:
	docker-compose exec app composer require laravel/socialite
	docker-compose exec app php artisan make:controller FacebookController
	docker-compose exec app php artisan make:middleware FacebookMiddleware
yarn-install:
	@make yarn
yarn-dev:
	docker-compose exec web yarn dev
yarn-watch:
	docker-compose exec web yarn watch
yarn-watch-poll:
	docker-compose exec web yarn watch-poll
yarn-hot:
	docker-compose exec web yarn hot
db:
	docker-compose exec db bash
sql:
	docker-compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
redis:
	docker-compose exec redis redis-cli
ide-helper:
	docker-compose exec app php artisan clear-compiled
	docker-compose exec app php artisan ide-helper:generate
	docker-compose exec app php artisan ide-helper:meta
	docker-compose exec app php artisan ide-helper:models --nowrite

# nuxt laravel auth
login-action:
	docker-compose exec app php artisan make:controller LoginAction --invokable
recreate-user-db:
	docker-compose exec app php artisan make:migration create_users_
cors:
	docker-compose exec app composer remove barryvdh/laravel-cors fruitcake/laravel-cors
	docker-compose exec app composer require fruitcake/laravel-cors
	docker-compose exec app php artisan vendor:publish --tag="cors"
auth:
	docker-compose exec app composer require laravel/ui
	docker-compose exec app php artisan migrate
route:
	docker-compose exec app php artisan route:list
gomi:
	git checkout .
	git clean -df
post:
	docker-compose exec app php artisan make:model Post -m
	docker-compose exec app php artisan make:model Tag -m
	docker-compose exec app php artisan make:migration create_post_tag_table --create=post_tag
	docker-compose exec app php artisan make:resource PostResource
	docker-compose exec app php artisan make:controller Api\\PostController -r
