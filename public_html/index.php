<?php

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
      
      echo json_encode(array('status' => 'success', 'data' => $response));
    } catch (\Exception $e) {
      //
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
