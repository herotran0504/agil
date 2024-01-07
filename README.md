## Installation


- `docker-compose build`
- `docker-compose up -d`
- `cp src/.env.example src/.env`
- `docker-compose run --rm composer update`
- `docker-compose run --rm artisan key:gen`


## Ports details:

- **nginx** - `:8080`
- **mysql** - `:3308`
- **php** - `:9000`

