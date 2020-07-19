# TestingProject

Install Project

docker-compose up --build

docker-compose exec web php bin.console doctrine:migration:migrate

Execute PHPUnit test

docker-compose exec web ./bin/phpunit

