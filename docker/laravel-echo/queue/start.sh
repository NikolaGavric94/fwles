#!/bin/bash
set -e

role=${CONTAINER_ROLE:-app}

if [ "$role" = "queue" ]; then
    echo "Running the queue worker..."
    php /var/www/artisan queue:work database --queue=chat --verbose --tries=2
else
    echo "Could not match the container role \"$role\""
    exit 1
fi