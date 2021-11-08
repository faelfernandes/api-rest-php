<?php

require_once '../vendor/autoload.php';

$path = ltrim($_SERVER['REQUEST_URI'], '/');
$elements = explode('/', $path);

if ($elements[0]) {
  if ($elements[0] === 'api') {
    header('Content-Type: application/json');
    array_shift($elements);

    try {
      if (empty($elements) || empty($elements[0])) {
        throw new \Exception("Api inválida");
      }

      $controller = 'App\Controllers\\' . ucfirst($elements[0] . 'Controller');
      array_shift($elements);
      $method = strtolower($_SERVER['REQUEST_METHOD']);

      try {
        if (!class_exists($controller)) {
          throw new \Exception("Classe não existe");
        }

        $response = call_user_func_array(array(new $controller, $method), $elements);

        http_response_code(200);
        echo json_encode(array('status' => 'success', 'data' => $response));
        exit;
      } catch (\Exception $e) {
        http_response_code(404);
        echo json_encode(array('status' => 'error', 'data' => $e->getMessage()), JSON_UNESCAPED_UNICODE);
        exit;
      }
    } catch (\Exception $e) {
      http_response_code(404);
      echo json_encode(array('status' => 'error', 'data' => $e->getMessage()), JSON_UNESCAPED_UNICODE);
      exit;
    }
  }
} else {
  // index
}

// dd($elements);
function dd($arg)
{
  echo "<pre>";
  var_dump($arg);
  echo "</pre>";
  exit;
}
