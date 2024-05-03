#!make

.PHONY: up
up: 
	docker compose -p garage up

.PHONY: build
build: 
	docker compose -p garage up --build

.PHONY: down
down: 
	docker compose -p garage down

.PHONY: prune
prune: 
	docker container prune
	docker volume prune