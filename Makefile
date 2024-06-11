APP_NAME = $(shell cat .env | grep APP_NAME | sed -E 's/.*=(.*)/\1/')

start:
	docker-compose up -d --build

rm:
	docker-compose -p "$(APP_NAME)" -f docker-compose.yml down

exec:
	docker exec -it ${APP_NAME}-server sh -c "$(c)"

make-migration:
	docker exec -it ${APP_NAME}-server sh -c "php bin/console make:migration"

run-migration:
	docker exec -it ${APP_NAME}-server sh -c "php bin/console doctrine:migrations:migrate"

phpstan:
	docker exec -it ${APP_NAME}-server sh -c "./vendor/bin/phpstan analyse --memory-limit=4G"

