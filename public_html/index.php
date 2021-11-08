<?php

header('Content-Type: application/json');

require_once '../vendor/autoload.php';

$path = ltrim($_SERVER['REQUEST_URI'], '/');
$elements = explode('/', $path);

if ($elements[0]) {
  if ($elements[0] === 'api') {
    array_shift($elements);
    
    $controller = 'App\Controllers\\' . ucfirst($elements[0] . 'Controller');
    array_shift($elements);
    
    $method = strtolower($_SERVER['REQUEST_METHOD']);

    try {
      $response = call_user_func_array(array(new $controller, $method), $elements);
      
      http_response_code(200);
      echo json_encode(array('status' => 'success', 'data' => $response));
      exit;
    } catch (\Exception $e) {
      http_response_code(404);
      echo json_encode(array('status' => 'error', 'data' => $e->getMessage()), JSON_UNESCAPED_UNICODE);
      exit;
    }
  }
}

// dd($elements);
function dd($arg)
{
  echo "<pre>";
  print_r($arg);
  echo "</pre>";
  return;
}
