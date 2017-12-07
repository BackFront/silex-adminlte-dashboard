<?php

namespace Modules\Module_tpl\Controller {

    use Modules\Base\Controller\Base;

    class Teste implements Base
    {

        private $title = "Usuários";
        private $uri = "teste"; //A URL que sera acessada: http://localhost/teste para este caso
        private $viewPath = "/Views/";

        public function __construct(\Silex\Application $app)
        {
            $this->routes($app);
        }

        private function routes(\Silex\Application $app)
        {
            /**
             * <h1>Index Route</h1>
             * 
             * Rota da index. Mostra a mensagem Hello World
             * @path /teste/
             */
            $app->get("/{$this->uri}", function(){
                return self::viewIndex();
            });
        }

        public static function viewIndex()
        {
            return "hello world";
        }

    }
}
