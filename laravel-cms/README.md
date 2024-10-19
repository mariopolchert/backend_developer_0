## Laravel Installation steps form GitHub

- klonirati repozitorij

```bash
git clone https://github.com/adobrini-algebra/backend_developer_0.git

cd backend_developer_0/laravel-cms
```

- kreirati bazu

```sql
 CREATE DATABASE IF NOT EXISTS laravel_cms DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
```

- stvoriti .env datoteku i u istoj urediti pristupne podatke za bazu i ostale kljuceve po potrebi

```bash
cp .env.example .env

php artisan key:generate
```

- zatim instalirati composer, migrirati bazu i instalirati npm 

```bash
composer install

php artisan migrate --seed

php artisan storage:link

npm install

npm run build
```

- ako imate gresku sa file permissionima izvrsite slijedece naredbe

```bash
sudo chown -R $USER:www-data storage/ bootstrap/cache/

sudo chmod -R 775 storage/ bootstrap/cache/
```
