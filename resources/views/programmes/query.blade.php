<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .programme-results-container {
                width: 35%;
                background: #252424;
            }

            .programme-container {
                width: 100%;
                height: 15%;
                display: flex;
                padding: 20px;
            }

            .programme-results-container hr {
                width: 90%;
            }

            .programme-img-container {
                width: 150px;
                padding: 10px 25px 10px 10px;
            }

            .programme-img-container img {
                max-width: 100%;
                max-height: 100%;
            }

            .programme-text-container {
                height: 25%;
                flex: 1;
                max-width: 50%;
            }

            .programme-text-container p {
                color: #f5f5f5;
            }

        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>
                        <a href="<?php echo e(route('register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="programme-results-container">
                    @foreach ($programmes as $programme)
                        <div class="programme-container">
                            <div class="programme-img-container">
                                @if (array_key_exists('image', $programme['programme']))
                                    <img src={{ "https://ichef.bbci.co.uk/images/ic/480x270/".$programme['programme']['image']['pid'].'.jpg' }}>
                                @endif
                            </div>
                            <div class="programme-text-container">
                                <p><strong>{{ $programme['title'] }}</strong></p>
                                <p>{{ $programme['programme']['short_synopsis'] }}</p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
