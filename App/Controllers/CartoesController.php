<?php
namespace App\Controllers;

use App\Models\Cartao;

class CartoesController
{
  public function get($id = null) {
    if ($id) {
      return Cartao::listarCartao($id);
    } else {
      return Cartao::listarCartoes();
    }
  }
}