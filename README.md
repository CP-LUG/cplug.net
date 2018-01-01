# cplug.net
Central PA Linux Users Group Website

### Run Setup Commands
Install needed Composer packages:
```sh
docker run --rm --user $(id -u):$(id -g) --volume $PWD:/app composer install
```
Install needed Node pacakages:
```sh
docker run --rm --user $(id -u):$(id -g) --volume $PWD:/usr/src/app --workdir /usr/src/app node npm install
```

### Docker Compose
To start a development environment it is as easy as running `docker-compose up`

### Running Artisan Commands
```sh
docker-compose exec --user $(id -u):$(id -g) web php artisan COMMAND
```

### Compiling SASS/JS
#### Development
Watch for file changes and recompile sass and js
```sh
docker run --rm --user $(id -u):$(id -g) --volume $PWD:/usr/src/app --workdir /usr/src/app node npm run watch
```
