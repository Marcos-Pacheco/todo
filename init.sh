#!/bin/bash

echo "============ CONFIGURANDO PROJETO, AGUARDE ... ============"
echo ""

docker compose up -d
docker exec -it lumen bash -c 'composer install'
docker exec -it postgres bash -c 'psql -U postgres -c "CREATE DATABASE todo;" || true'
cp ./lumen/.env.example ./lumen/.env
docker exec -it lumen bash -c 'php artisan migrate'

echo ""
echo "================= CONFIGURAÇÃO FINALIZADA ================="