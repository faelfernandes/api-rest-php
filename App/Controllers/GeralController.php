<?php
namespace App\Controllers;

use App\Models\Geral;

class GeralController
{
  public function get($id = null) {
    if ($id) {
      if (!is_int(intval($id))) {
        return "teste";
      }
      return Geral::listarPorId($id);
    } else {
      return Geral::listarGeral();
    }
  }
}