#### if getting this error

➜ php_blog git:(dev-1) php artisan serve

Fatal error: Uncaught Error: Class 'Illuminate\Filesystem\Filesystem' not found in /Users/erikwjonsson/Desktop/Programming/php_blog/vendor/laravel/framework/src/Illuminate/Foundation/Application.php:175
Stack trace:
#0 /Users/erikwjonsson/Desktop/Programming/php_blog/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(144): Illuminate\Foundation\Application->registerBaseBindings()
#1 /Users/erikwjonsson/Desktop/Programming/php_blog/bootstrap/app.php(15): Illuminate\Foundation\Application->\_\_construct('/Users/erikwjon...')
#2 /Users/erikwjonsson/Desktop/Programming/php_blog/artisan(20): require_once('/Users/erikwjon...')
#3 {main}
thrown in /Users/erikwjonsson/Desktop/Programming/php_blog/vendor/laravel/framework/src/Illuminate/Foundation/Application.php on line 175

#### solution

-   `Remove the "vendor" folder and "composer.lock" and run:
-   `composer install`

    https://laracasts.com/discuss/channels/general-discussion/fatal-error-class-illuminatefoundationapplication-not-found-in-pathtoprojectbootstrapappphp-on-line-14?page=0

\*

#### MVC pattern

-   https://selftaughtcoders.com/from-idea-to-launch/lesson-17/laravel-5-mvc-application-in-10-minutes/

##### path to class files

-   https://laracasts.com/discuss/channels/general-discussion/l5-how-to-add-custom-php-classes-in-l5

##### TODO

-   move form into separate form
-   https://www.tutorialspoint.com/laravel/laravel_forms.htm

### forms

-   make sure to ahve params in form url also.
    `echo Form::open(array('url' => 'programmes/query/{string}', 'method' => 'get'));`
