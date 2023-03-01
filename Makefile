.PHONY: all

SHELL=/bin/bash -e

.DEFAULT_GOAL := help

help: ## Help info about this Makefile
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

#####################
### Docker config ###
#####################

build: ## Build project docker images
	@docker-compose build

up: ## Up docker containers by docker-compose config
	@docker-compose up -d --remove-orphans

composer: ## Install dependencies
	@docker-compose exec -it php composer install

bash: ## Run bash in php container
	@docker-compose exec php bash
