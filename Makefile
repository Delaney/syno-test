APP_NAME = $(shell cat .env | grep APP_NAME | sed -E 's/.*=(.*)/\1/')

start:
	docker-compose up -d --build

make-migration:
	docker exec -it ${APP_NAME}-server sh -c "php bin/console make:migration"

run-migration:
	docker exec -it ${APP_NAME}-server sh -c "php bin/console doctrine:migrations:migrate"
