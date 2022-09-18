# AKAI-generator-wnioskow-symfony

Instalacja:
- podmień .env.test na .env oraz wypełnij swoimi ustawieniami
- composer update, composer install
- zmien w pliku .env dane do logowania do bazy DATABASE_URL

## Project building
app image takes long time to build, it's because of LaTeX installation.
[See this issue.](https://github.com/akai-org/AKAI-generator-wnioskow-symfony/issues/38)


### LOCAL DEVELOPMENT
Use Docker.
```
docker-compose up -d --build
```

### DEPLOY
Use Docker, through SSH. [See this issue.](https://github.com/akai-org/AKAI-generator-wnioskow-symfony/issues/39).
Remember to switch to main branch and pull recent changes.

If the change do not involve change in php extensions, composer dependencies,
latex compiler or docker-compose itself then it is not necessary 
to build image up again.

Please, I beg you: **check the changes locally before deploying, especially
when you are going to build images there**.
```
git checkout main
git pull
docker-compose up -d --build
```
