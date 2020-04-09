# Intersect Framework
A PHP web framework built for making dev life a little easier.

---
## Installation using Composer
Run the following command to create your project using Composer
```bash
composer create-project hidalgo-rides/intersect-framework <directory-path>
```

---
## Local Deployment using Docker
Now you should be ready to bring up the Docker environment (must have Docker installed)  
```bash
# navigate to directory where you installed your project files
cd <directory-path>

# bring up the project using docker-compose
docker-compose up -d
```
You should now be able to navigate to http://localhost:8080 in your browser once the environment is up.

---
## Useful Endpoints / Ports
- Site: http://localhost:8080
- PHPMyAdmin: http://localhost:8081
- MySQL Port: 3306

*(ports are defined in the docker-compose.yml file)*

---
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

---
## Database Migrations
Intersect makes use of built-in database migration support. Migration files are an easy way to define your database table definations, seed data for development, and allows databases schemas to be maintained through source control.

Here are a few commands you can use to create migration files, create seed files, apply the existing migrations, and reset the database.

### Creating Migration Files
```bash
docker exec app sh -c 'php intersect migrations:generate CreateXXXTable'
```

(you can replace the last parameter "CreateXXXFile" with whatever you want)

Your new migration file will be created under the `src/Migrations` directory.


### Creating Seed Data Files
Seed data files are used to create data that can be used during development or testing. These seed data files are not automatically applied when the other migrations are applied. Seed data files are always applied last after all the other migration files have been run. (if the `--seed` flag is used)

```bash
docker exec app sh -c 'php intersect migrations:generate-seed SeedDataFile'
```

### Applying Migration Files (without seed data)
```bash
docker exec app sh -c 'php intersect migrations:run'
```

### Applying Migration Files (with seed data)
```bash
docker exec app sh -c 'php intersect migrations:run --seed'
```

### Reset Your Database (without seed data)
```bash
docker exec app sh -c 'php intersect migrations:reset'
```

### Reset Your Database (with seed data)
```bash
docker exec app sh -c 'php intersect migrations:reset --seed'
```

---
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


---
## License
Intersect Framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).