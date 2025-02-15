# Develop a dynamic Multi-Language website using Laravel Localization
This Laravel 11 demo application is to show how you can create a dynamic multi-language website using Laravel Localization. You can store Languages in a database table and show a language switcher (dropdown) to the user to select a preferred language. If a new Language is added to the database, you only need to create Laravel language files for that language and place it in the ‘lang’ folder. You don't have to change any program code. Tutorial - https://codehow2.com/laravel/create-a-dynamic-multi-language-website-in-laravel.

# How To Use
1. Download the repository from https://github.com/sundarsau/lara_multi_lang

2. Extract it into a folder

3. Create a Database in MySQL

4. Copy .env.example to .env and update DB_CONNECTION=mysql and uncomment DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME and DB_PASSWORD. Then give DB_DATABASE as the database you just created.

5. Run composer install from the project root

6. Run php artisan key:generate

7. Run php artisan migrate. This will create Laravel default table and the custom tables named 'languages'.

8. Run php artisan serve

9. In Browser run localhost:8000

10. Now add/update languages, add English language with code 'en'. Then add French(fr), Spanish (es), Hindi (hi). You will see the languages are appearing the dropdown. Select a language and see the content displayed in the selected language.

License
This is an MIT license, you can modify the code according to your requirements
