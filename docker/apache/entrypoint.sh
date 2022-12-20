#!/usr/bin/env bash

# -n Do not ask any interactive question
composer install -n
# composer update --with-all-dependencies --no-interaction
# composer dump-autoload --no-dev --classmap-authoritative

php bin/console doctrine:database:create -n
php bin/console doctrine:migrations:migrate -n
php bin/console doctrine:fixtures:load -n

## bin/console doc:mig:mig --no-interaction
## bin/console doc:fix:load --no-interaction

# apt-get install zip unzip -y

exec "$@"
