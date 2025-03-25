<?php
class App {
    protected $controller = DEFAULT_CONTROLLER;
    protected $method = DEFAULT_METHOD;
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();
        
        // Controller
        if(isset($url[0]) && file_exists('controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        
        require_once 'controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        
        // Method
        if(isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
        
        // Parameters
        $this->params = $url ? array_values($url) : [];
        
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    
    public function parseUrl() {
        if(isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
?>