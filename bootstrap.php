<?php
/** APPLICATION
 * *********** *//* GLOBAL *//* CONSTANTS */
define('SAD_APP_NAME', 'SAD'); //nome da aplicacao
define('SAD_VERSION', '0.1.0'); //versao da aplicacao
define('SAD_MODULE_PATH', DIRECTORY_SEPARATOR . 'modules'); //pasta onde estao dos modulos
define('SAD_BOOTSTRAP_PATH', dirname(__FILE__)); //caminho absoluto
define('SAD_INCLUDES_PATH', SAD_BOOTSTRAP_PATH . '/includes'); //pasta de includes

/** APPLICATION
 * ********************** *//* CONFIGS */
if (file_exists("config/config.dev.php")) {
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);
    define("ENVIRONMENT", "dev");
    define("DEBUG", TRUE);
    require_once( "config/config.dev.php" );
} elseif (file_exists("config/config.hom.php")) {
    error_reporting(E_ERROR | E_WARNING);
    ini_set('error_reporting', E_ALL);
    define("ENVIRONMENT", "hom");
    define("DEBUG", TRUE);
    require_once( "config/config.hom.php" );
} elseif (file_exists("config/config.prod.php")) {
    error_reporting(0);
    define("ENVIRONMENT", "prod");
    define("DEBUG", FALSE);
    require_once( "config/config.prod.php" );
} else {
    die("Nenhum arquivo de configuração encontrado");
}

/* * ******************** *//* INCLUDES */
require_once( SAD_BOOTSTRAP_PATH . "/vendor/autoload.php" ); // vendor autoload
require_once( SAD_INCLUDES_PATH . "/autoload.php" ); // obrigatório

/** MODULES
 * ********************** *//* INIT */
$modulos = array(
    'Base', // Esse módulo contém helpers e uma interface. É legal utiliza-la
    'Module_tpl' //Template of module
);

// Inicia aplicação
$app = new Silex\Application();
$app['debug'] = DEBUG;

// Inicia os controllers
core_load_modules($modulos, $app);

// Roda a aplicação
$app->run();
