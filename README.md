# Тестовое задание. Бэкэнд часть приложения 

## Инструкции по развертыванию:
1. `npm i`
2. `composer install`
3. Создать .env (`cp .env.example .env`), создать бд, прописать конфиг для подключения (Я использовал PostgreSQL, в запросах использовал функции из него, поэтому с другими бд может не работать)
4. `php artisan migrate`
5. `php artisan db:seed` (Один посев - одна неделя)
6. `php artisan serve`
7. Проверить http://127.0.0.1:8001/api/get

### Верися PHP - 8.0
