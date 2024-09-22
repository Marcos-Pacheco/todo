DOCKER_COMPOSE=docker compose

up:
	$(DOCKER_COMPOSE) up -d
down:
	$(DOCKER_COMPOSE) down
restart:
	$(DOCKER_COMPOSE) restart
true-restart:
	$(DOCKER_COMPOSE) down && $(DOCKER_COMPOSE) up -d
build:
	$(DOCKER_COMPOSE) up --build
rebuild:
	$(DOCKER_COMPOSE) up --build

