    #!/bin/bash

    # Build and start containers
    docker-compose up -d --build

    # Run migrations and seeders (optional, be careful with seeders in production)
    docker-compose exec -T app php artisan migrate --force

    # Clear cache
    docker-compose exec -T app php artisan optimize:clear
    docker-compose exec -T app php artisan config:cache
    docker-compose exec -T app php artisan route:cache
    docker-compose exec -T app php artisan view:cache

    echo "Deployment finished!"
