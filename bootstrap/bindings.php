<?php
use Brunty\App;
use Klein\Klein;
use Predis\Client as Redis;

$app = new App;

/**
 * TODO: Maybe refactor this so it doesn't feel so hacky with the way multiple config files are included
 *
 * @param $c
 *
 * @return array
 */
$app['config'] = function ($c) {
    return [
        'app'      => include "../config/app.php",
        'services' => include "../config/services.php",
        'redis'    => include "../config/redis.php"
    ];
};

/**
 * Bind our router to the container
 *
 * @param $c
 *
 * @return Klein
 */
$app['router'] = function ($c) {
    return new Klein();
};

/**
 * @param $c
 *
 * @return Twig_Environment
 */
$app['view'] = function ($c) {
    $loader = new Twig_Loader_Filesystem('../resources/views');
    $twig = new Twig_Environment(
        $loader,
        array(
            'cache'       => '../storage/cache/views',
            'auto_reload' => true
        )
    );

    return $twig;
};

/**
* Bind our Redis client to the container
*
 * @param $c
*
 * @return Redis
*/
$app['redis'] = function ($c) {
    return new Redis($c['config']['redis']);
};
