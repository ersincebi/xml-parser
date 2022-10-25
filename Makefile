build:
	@docker-compose up -d --build
	@docker exec -i debian_php_74 php ./migrations/create_tables.php

remove:
	@docker-compose down
	@docker system prune -af
	@docker volume prune -f