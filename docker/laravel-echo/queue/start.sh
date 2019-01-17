#!/bin/bash
set -e

role=${CONTAINER_ROLE:-app}

if [ "$role" = "queue" ]; then
    echo "Running the queue worker..." && php /var/www/artisan queue:work --queue=chat --timeout=35 --verbose --tries=2
elif [ "$role" = "scheduler" ]; then
    echo "Running the scheduler..."
    while [ true ]
    do
      php /var/www/artisan schedule:run --verbose --no-interaction &
      sleep 60
    done
else
    echo "Could not match the container role \"$role\""
    exit 1
fi