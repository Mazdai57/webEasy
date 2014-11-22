<?php

class Route {
    private static $numberController = 2;
    private static $numberAction = 3;
    
    private static $root;
    
    public static function start() {
       // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        // получаем имя контроллера
        if (!empty($routes[static::$numberController])) {	
            $controller_name = $routes[Route::$numberController];
        }
        
        $base_dir  = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
        $doc_root  = preg_replace("!{$_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
        $base_url  = preg_replace("!^{$doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
        $base_url  = str_replace('application/core', '', $base_url);
        $protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
        $port      = $_SERVER['SERVER_PORT'];
        $disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
        $domain    = $_SERVER['SERVER_NAME'];
        $full_url  = "$protocol://{$domain}{$disp_port}{$base_url}"; # Ex: 'http://example.com', 'https://example.com/mywebsite', etc

        static::setRoot($full_url);
        
        // получаем имя экшена
        if (!empty($routes[static::$numberAction])) {
            $action_name = $routes[Route::$numberAction];
        }

        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        $detect = new Mobile_Detect;
        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        if ($detect->isMobile()) {
            $model_path = 'application/mobile/models/'.$model_file;
        } else {
            $model_path = 'application/models/'.$model_file;
        }
        if(file_exists($model_path)) {
            include $model_path;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        if ($detect->isMobile()) {
            $controller_path = "application/mobile/controllers/"
                    .$controller_file;
        } else {
            $controller_path = "application/controllers/".$controller_file;
        }
        if(file_exists($controller_path)) {
            include $controller_path;
        } else {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
//            Route::ErrorPage404();
        }
        
        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;
        
        if(method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            // здесь также разумнее было бы кинуть исключение
//            Route::ErrorPage404();
        }
    }
    
    public static function setRoot($root) {
        self::$root = $root;
    }
    
    public static function getRoot() {
        return self::$root;
    }
    
    public function ErrorPage404() {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}

