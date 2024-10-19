## Laravel Installation steps form GitHub

- kreirati bazu

```
git clone https://github.com/adobrini-algebra/backend_developer_0.git

cd backend_developer_0/laravel-cms

composer install

cp .env.example .env
```

- u .env datoteci urediti pristupne podatke za bazu i ostale kljuceve po potrebi

```
php artisan key:generate

php artisan migrate --seed

php artisan storage:link

npm install

npm run build
```

