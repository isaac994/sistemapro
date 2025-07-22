# Celupro – Sistema de Ventas de Celulares

## Setup Inicial

```bash
composer create-project laravel/laravel celupro "^12.0"
cd celupro
composer require laravel/breeze --dev
php artisan breeze:install vue --inertia
npm install && npm run dev
cp .env.example .env
php artisan key:generate
```

## Configuración de Base de Datos (XAMPP)

- DB_DATABASE=celupro_db
- DB_USERNAME=root
- DB_PASSWORD=

## Migraciones y Seeders

```bash
php artisan migrate --seed
```

## Estructura de Tablas

- roles, categorias, marcas
- usuarios, clientes, proveedores
- productos, inventario
- compras, detalle_compras
- ventas, detalle_ventas
- pagos

> Las migraciones ya incluyen índices y ON DELETE CASCADE donde corresponde.
