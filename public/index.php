<?php

/**
 * User: Abdessamad
 * Date: 7/7/2020
 * Time: 9:57 AM
 */


use app\controllers\AboutController;
use app\controllers\SiteController;
use app\controllers\LibiraryController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->on(Application::EVENT_BEFORE_REQUEST, function () {
    // echo "Before request from second installation";
});

$app->router->get('/', [SiteController::class, 'home']);
$app->router->post('/', [SiteController::class, 'home']);
// $app->router->get('/',  'home');
$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/register', [SiteController::class, 'register']);
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->get('/login/{id}', [SiteController::class, 'login']);
$app->router->post('/login', [SiteController::class, 'login']);
$app->router->get('/logout', [SiteController::class, 'logout']);
$app->router->get('/document', [SiteController::class, 'document']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/about', [AboutController::class, 'index']);
// $app->router->get('/aboute', [AboutController::class, 'test']);
$app->router->get('/libirary', [LibiraryController::class, 'index']);
$app->router->post('/libirary', [LibiraryController::class, 'index']);
$app->router->get('/modulesajax', [LibiraryController::class, 'ajaxModules']);
// $app->router->post('/specialite', [LibiraryController::class, 'test']);
$app->router->get('/publier', [LibiraryController::class, 'publier']);
$app->router->post('/publier', [LibiraryController::class, 'publier']);
$app->router->get('/document', [LibiraryController::class, 'document']);
$app->router->get('/deletdocument', [LibiraryController::class, 'deletDocument']);
$app->router->get('/acceptdocument', [LibiraryController::class, 'acceptDocument']);
$app->router->get('/masquerdocument', [LibiraryController::class, 'masquerDocument']);
$app->router->get('/updatedocument', [LibiraryController::class, 'updateDocument']);
$app->router->post('/updatedocument', [LibiraryController::class, 'updateDocument']);
$app->router->get('/profile', [SiteController::class, 'profile']);
$app->router->get('/profile/{id:\d+}/{username}', [SiteController::class, 'login']);
$app->router->get('/profil/{id:\d+}/{username}', [SiteController::class, 'login']);
// /profile/{id}
// /profile/13
// \/profile\/\w+

// /profile/{id}/zura
// /profile/12/zura

// /{id}
$app->run();
