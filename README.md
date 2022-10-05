# Поднимаем через laravel sail
```
./vendor/bin/sail up
./vendor/bin/sail composer install
./vendor/bin/sail npm install
```

Выполнить миграции
```
./vendor/bin/sail artisan migrate
```

Делал сиды для начальных данных 
```
./vendor/bin/sail artisan db:seed
```

> без вышеупомянутых шагов будет ошибка, так-как база не заполнена.

Cделал на inertia.js+vue.

Добавление постов и комментирование доступно, только для зарегистрированных пользователей. 

Регистрация и логин работают 
