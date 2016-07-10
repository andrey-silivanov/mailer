1. Выполнить в консоли команду composer install
2. Переименовать файл .env.example в .env
3. В файле .env изменить настройки подключения к базе данных.
	Также нужно заменить настроки почты на:
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=test.mailer2016.laravel@gmail.com
MAIL_PASSWORD=testlaravel
MAIL_ENCRYPTION=ssl	
4. Создать таблицы: php artisan migrate
5. Записать тестовые данные в таблицы: php artisan db:seed

Login:  test.mailer2016.laravel@gmail.com
Password: testlaravel