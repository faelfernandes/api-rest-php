<?php
namespace App\Controllers;

use App\Models\Cartao;

class CartoesController
{
  public function get($id = null) {
    if ($id) {
      if (!is_int(intval($id))) {
        throw new \Exception("Parâmetro inválido");
      }
      return Cartao::listarCartao($id);
    } else {
      return Cartao::listarCartoes();
    }
  }
}