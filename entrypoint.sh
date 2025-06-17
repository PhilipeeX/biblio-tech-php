#!/bin/bash

echo "🚀 Iniciando setup da aplicação Laravel..."

# Aguardar o banco de dados ficar disponível
echo "🔄 Aguardando banco de dados..."
while ! nc -z db 3306; do
    sleep 1
done
echo "✅ Banco de dados disponível!"

# Instalar dependências se não existirem
if [ ! -d "vendor" ]; then
    echo "📦 Instalando dependências PHP..."
    composer install --no-dev --optimize-autoloader
fi

# Verificar se .env existe, se não, criar
if [ ! -f .env ]; then
    echo "📄 Criando arquivo .env..."
    cp .env.example .env
fi

# Gerar chave da aplicação se não existir
if ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Gerando chave da aplicação..."
    php artisan key:generate --force
fi

# Configurar permissões ANTES de executar migrations
echo "🔐 Configurando permissões..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Executar migrations
echo "🗃️ Executando migrations..."
php artisan migrate --force

# Executar seeders
echo "🌱 Executando seeders..."
php artisan db:seed --force

# Limpar e otimizar caches
echo "🧹 Limpando caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Otimizar para produção (opcional em desenvolvimento)
echo "⚡ Otimizando aplicação..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Verificar permissões novamente (garantir que tudo está ok)
echo "🔐 Verificação final de permissões..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

echo "🎉 Aplicação pronta! Acesse: http://localhost:8000"

# Executar comando passado como argumento (php-fpm)
exec "$@"
