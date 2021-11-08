<?php
namespace App\Controllers;

use App\Models\Pessoa;

class PessoasController
{
  public function get($id = null) {
    if ($id) {
      if (!is_int(intval($id))) {
        throw new \Exception("Parâmetro inválido");
      }
      return Pessoa::listarPessoa($id);
    } else {
      return Pessoa::listarPessoas();
    }
  }
}