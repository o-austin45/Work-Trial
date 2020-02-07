#!/bin/bash

tmlstarterkit() {
  # echo "tml $1 ${@:2}" >> ~/odm-toolkit.log

  tmlstarterkit_$1 ${@:2}
}

alias tsk="tmlstarterkit"



function tmlstarterkit_dir {
  cd $TSK_DIR
}



#
# Manually Accessing Containers
#
function tmlstarterkit_container:ssh {
  docker exec -it $1 bash
}
function tmlstarterkit_container:cmd {
  docker exec -it $1 bash -c "${@:2}"
}
function tmlstarterkit_container:run {
  tmlstarterkit_dir && docker-compose run --rm $1 "${@:2}"
}



#
# Laravel / Composer
#
function tmlstarterkit_composer:install {
  tmlstarterkit_container:run composer composer install
}
function tmlstarterkit_composer:update {
  tmlstarterkit_container:run composer composer update
}
function tmlstarterkit_composer:require {
  tmlstarterkit_container:run composer composer require $@
}
function tmlstarterkit_composer:remove {
  tmlstarterkit_container:run composer composer remove $@
}
function tmlstarterkit_composer:dump {
  tmlstarterkit_container:run composer composer dump
}



#
# Vue / Node
#
function tmlstarterkit_vue:install {
  tmlstarterkit_container:run tmlstarterkit npm install $@
}
function tmlstarterkit_vue:uninstall {
  tmlstarterkit_container:run tmlstarterkit npm uninstall $@
}



#
# Api
#
function tmlstarterkit_api:output {
  tmlstarterkit_dir
  docker-compose logs --follow nginx mysql php phpmyadmin redis
}
function tmlstarterkit_nginx:output {
  tmlstarterkit_dir
  docker-compose logs --follow nginx
}
function tmlstarterkit_mysql:output {
  tmlstarterkit_dir
  docker-compose logs --follow mysql
}
function tmlstarterkit_php:output {
  tmlstarterkit_dir
  docker-compose logs --follow php
}
function tmlstarterkit_redis:output {
  tmlstarterkit_dir
  docker-compose logs --follow redis
}

function tmlstarterkit_api:build {
  tmlstarterkit_dir
  docker-compose build nginx php redis mysql phpmyadmin
  docker-compose build composer
  docker-compose build tinker
}
function tmlstarterkit_api:start {
  tmlstarterkit_dir
  docker-compose up -d nginx php redis mysql phpmyadmin
}
function tmlstarterkit_api:stop {
  tmlstarterkit_dir
  docker-compose stop nginx php redis mysql phpmyadmin
}
function tmlstarterkit_api:restart {
  tmlstarterkit_dir
  docker-compose restart nginx php redis mysql phpmyadmin
}



#
# Artisan / Tinker
#
function tmlstarterkit_artisan {
  tmlstarterkit_container:run tinker php artisan $@
}
function tmlstarterkit_tinker {
  tmlstarterkit_artisan tinker
}
