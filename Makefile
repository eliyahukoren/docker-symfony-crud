##################
# Variables
##################
DOCKER_COMPOSE = docker-compose -f docker-compose.yml --env-file ./docker/.env
DOCKER_REBUILD = ${DOCKER_COMPOSE} build && ${DOCKER_COMPOSE} up -d --remove-orphans
dc_build:
	${DOCKER_COMPOSE} build

dc_up:
	${DOCKER_COMPOSE} up

dc_rebuild:
	${DOCKER_REBUILD}	

dc_web:
	docker exec -it crud-php-web bash

dc_stop:
	${DOCKER_COMPOSE} stop	

git_ignore:
	git rm -r --cached . && git add . && git commit -m "".gitignore is now working"	

git_ignore_file:
	git rm --cached ???	

# build:
# 	docker-compose up --build -d

# up:
# 	docker-compose up -d

# # stop:
# # 	docker stop $(docker ps -a -q) && docker system prune -af --volumes

# web:
# 	docker exec -it php-web bash

# mysql:
# 	docker exec -it mysql_db bash
