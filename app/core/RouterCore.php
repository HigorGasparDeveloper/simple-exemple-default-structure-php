<?php
namespace app\core; 
use Exception;
class RouterCore{
  private $requests = array(), $uri, $typeRequest;
  public function __construct(string $uri,string $typeRequest){
    $this->uri = $uri;
    $this->typeRequest = $typeRequest;
  }

  private static function verifyPath(array $requests,string $uri){
    return in_array($uri,array_map(function($value){ return $value['path']; },$requests)); 
  }

  public function run(){
    $requestsType = $this->getRequestsType();
    $verifyPathExist = self::verifyPath($requestsType,$this->uri);
    if(!$verifyPathExist){
      http_response_code(404);
      echo "Página não existe";
      //dirigir para página 404
      return;
    }    

    foreach($requestsType as $request) {
      if($request['path'] == $this->uri){
        $call = $request['call'];
        if(is_callable($call)){
          $call();
          break;
        }

        $call = explode("::",$call);
        $controller = $call[0];
        $method = $call[1];

        $class = "\app\controllers\\$controller";
        //verificando se classe existe
        if(!class_exists($class)){
          http_response_code(404);
          echo "Classe não existe";
          //dirigir para página 404
          break;
        }

        $class = new $class();

        //verificando se método existe
        if(!method_exists($class,$method)){
          http_response_code(404);
          echo "Método não existe";
          //dirigir para página 404
          break;
        }

        call_user_func_array([$class,$method],[]);
      }
    }
  }

  public function get(string $path, $call){
    $this->requests['GET'][] = [
      'path'=>$path,
      'call'=>$call
    ];
  }

  public function post(string $path, $call){
    $this->requests['POST'][] = [
      'path'=>$path,
      'call'=>$call
    ];
  }

  private function getRequestsType():array{
    return $this->requests[$this->typeRequest];
  }

  private function executeRequest(){
    $requestsType = $this->getRequestsType();
    foreach($requestsType as $request) {
      //do
    }
  }

}
?>