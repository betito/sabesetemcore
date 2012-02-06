#!/bin/sh

echo 'Um momento'
sudo cp -r * /var/www/selfservice/test/www
sudo chmod -R 777 /var/www/selfservice/test/www
echo 'pronto...'
