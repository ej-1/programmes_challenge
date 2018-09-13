<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Programme Finder</title>
    </head>
    <body>
        <div class="content">
            <?php
                echo Form::open(array('url' => 'programmes/query/{glllweflwlfwle}', 'method' => 'get'));
                    echo Form::text('search');
                    echo '<br/>';
                    echo Form::submit('Submit');
                echo Form::close();
            ?>
        </div>
    </body>
</html>
