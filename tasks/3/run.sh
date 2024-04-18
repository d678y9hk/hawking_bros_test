source .env

sudo docker exec $APP_NAME-php bash -c "cd /var/www/tasks/3 && php run.php" 
