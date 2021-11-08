<?php
namespace App\Controllers;

use App\Models\Pessoa;

class PessoasController
{
  public function get($id = null) {
    if ($id) {
      return Pessoa::listarPessoa($id);
    } else {
      return Pessoa::listarPessoas();
    }
  }
}