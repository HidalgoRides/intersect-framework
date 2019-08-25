# Intersect Framework
A PHP web framework built for making dev life a little easier.

## Installation using Composer
Run the following command to create your project using Composer
```bash
composer create-project hidalgo-rides/intersect-framework <directory-path>
```

## Configuration Setup
Copy and rename the file `configs/config.php.dev` to `config/config.php`. This new file will be ignored by GIT by default so you will need to do this for each environment you have.  

Once copied, open up your new `config.php` file.

You MUST enter your own value for the `key` inside the `app` configuration section. This value will be used to make your application unique and may be used in various features as an added layer of security, either in encryption or other means.  

This value should never be changed once it is set, so make sure you choose wisely :) Key values are recommended to be different for each environment, but just note that some features that rely on this value might not work between environments if you choose to make them different.

## Local Deployment using Docker
Now you should be ready to bring up the Docker environment (must have Docker installed)  
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

*(ports are defined in the docker-compose.yml file)*

## Useful Docker Commands
### Starting Local Environment
Run the following Docker command to start load the environment inside Docker containers
```bash
docker-compose up -d
```

### Stopping Local Environment
Run the following Docker command to tear down your environment and stop your Docker containers
```
docker-compose down
```

### Viewing Local Logs
If you want to watch the Docker environment logs, run the following Docker command
```
docker-compose logs -f
```

## Running PHPUnit Tests
Ensure the Docker container is started, if not, please see Starting and Stopping Environment section

### Run
Run the following command to run the PHPUnit tests ("app" matches service defined in docker-compose.yml)
```
docker exec app vendor/bin/phpunit
```

### Run with Coverage Report
If you want to generate code-coverage reports while running the PHPUnit tests, run the following command ("app" matches service defined in docker-compose.yml)
```
docker exec app vendor/bin/phpunit --coverage-html=./tests/coverage-results
```
This will create your coverage report inside the `tests/coverage-results` directory