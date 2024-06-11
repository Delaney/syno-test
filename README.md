### Introduction

This sample web app allows the creation, updating and deletion of panelists and basic surveys. Surveys can be assigned to panelists while editing the panelist. 

---

### Getting Set Up

1. In the repo root directory, run the following commands:
```
cp .env.example .env
```

2. If you have Make installed, you can spin up the containers by running `make start`.
If not, simply run `docker-compose up -d --build`

   run-migration:
   docker exec -it ${APP_NAME}-server sh -c "php bin/console doctrine:migrations:migrate"

3. Next, execute migrations by running `make run-migration` if you have Make installed, or `docker exec -it ${APP_NAME}-server sh -c "php bin/console doctrine:migrations:migrate`, replacing `${APP_NAME}` as specified in your `.env` file.

At this point, the services should be running. If you did not reconfigure the ports, the app can be accessed via `http://localhost:8101`.