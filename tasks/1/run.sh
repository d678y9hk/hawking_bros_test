source .env

sudo docker exec $APP_NAME-php bash -c "cd /var/www/tasks/1 && php run.php" 
