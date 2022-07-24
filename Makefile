REQUIREMENTS = docker docker-compose vi
DOCKER_CONTAINER = booking
DOCKER_MYSQL_CONTAINTER = booking-database

preflight:
	$(foreach REQUIREMENT, $(REQUIREMENTS), \
		$(if $(shell command -v $(REQUIREMENT) 2> /dev/null), \
			$(info Found `$(REQUIREMENT)`), \
			$(error Please install `$(REQUIREMENT)`) \
		) \
	)

# Build Project
setup: preflight
	cp docker-compose.dev.yml docker-compose.override.yml
	vi docker-compose.override.yml
	cp public/.htaccess-without-basic-auth public/.htaccess
	docker-compose up -d --build
	cp .env.local .env
	docker-compose exec $(DOCKER_CONTAINER) composer install
	docker-compose exec $(DOCKER_CONTAINER) php artisan key:generate
	docker-compose exec $(DOCKER_CONTAINER) php artisan config:clear
	docker-compose exec $(DOCKER_CONTAINER) chmod -R 777 ./

# Run Project
up:
	docker-compose up -d
	docker-compose exec $(DOCKER_CONTAINER) chmod -R 777 ./

# Stop Project
down:
	docker-compose down

# Include Baisc
basic-auth-up:
	cp public/.htaccess-with-basic-auth public/.htaccess

# Exclude Baisc
basic-auth-down:
	cp public/.htaccess-without-basic-auth public/.htaccess

# Create initial database
create-database-local:
	sudo bash ./docker/mysql/create-database-local.sh

# Add allowed IP in admin system
add-allow-local:
	vi config/AdminAllowIp.php
	docker-compose exec $(DOCKER_CONTAINER) php artisan config:clear
