Поднимал через sail
```
./vendor/bin/sail up
./vendor/bin/sail composer install
./vendor/bin/sail npm install
```

Делал сиды для начальных данных 
```
./vendor/bin/sail artisan db:seed
```
но! если вдруг сиды кривые, то положил дамп базы в корень проекта.

Добавление постов и комментирование доступно, только для зарегистрированных пользователей. Регистрация и логин работают 
