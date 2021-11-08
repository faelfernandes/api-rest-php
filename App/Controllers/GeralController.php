<?php
namespace App\Controllers;

use App\Models\Geral;

class GeralController
{
  public function get($id = null) {
    if ($id) {
      return Geral::listarPorId($id);
    } else {
      return Cartao::listarGeral();
    }
  }
}