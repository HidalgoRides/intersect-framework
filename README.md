# Intersect Framework
A PHP web framework built for making dev life a little easier.

## Installation using Composer and Docker
* Run the following command to create your project using Composer
```bash
composer create-project hidalgo-rides/intersect-framework <directory-path>
```

* Now you should be ready to bring up the Docker environment (must have Docker installed)  
```bash
# navigate to directory where you installed your project files
cd <directory-path>

# bring up the project using docker-compose
docker-compose up -d
```
You should now be able to navigate to http://localhost:8080 in your browser once the environment is up.

## Useful Endpoints / Ports
- Site: http://localhost:8080
- PHPMyAdmin: http://localhost:8081
- MySQL Port: 3306

## Starting and Stopping Environment
Run the following Docker command to start load the environment inside Docker containers
```bash
docker-compose up -d
```

Run the following Docker command to tear down your environment and stop your Docker containers
```
docker-compose down
```

If you want to watch the Docker environment logs, run the following Docker command
```
docker-compose logs -f
```

## Composer Dependencies
Ensure the Docker container is started, if not, please see Starting and Stopping Environment section above.

Run the following Docker command to interact with Composer to install/update dependencies
```bash
docker-compose run --rm composer <command>
```

## Running PHPUnit Tests
Ensure the Docker container is started, if not, please see Starting and Stopping Environment section

#### Run
Run the following command to run the PHPUnit tests ("app" matches service defined in docker-compose.yml)
```
docker exec app vendor/bin/phpunit
```

#### Run with Coverage Report
If you want to generate code-coverage reports while running the PHPUnit tests, run the following command ("app" matches service defined in docker-compose.yml)
```
docker exec app vendor/bin/phpunit --coverage-html=./tests/coverage-results
```
This will create your coverage report inside the `tests/coverage-results` directory