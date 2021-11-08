<?php

namespace App\Models;
use App\Conexao;

class Pessoa
{
  private static $table = 'usuario';

  public static function listarPessoa(int $id)
  {
    $sql = 'SELECT * FROM ' . self::$table . ' WHERE id = :id';
    $stmt = Conexao::conexao()->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return $stmt->fetch(\PDO::FETCH_ASSOC);
    } else {
      throw new \Exception("Nenhuma pessoa encontrada");
    }
  }

  public static function listarPessoas()
  {
    $sql = 'SELECT * FROM ' . self::$table;
    $stmt = Conexao::conexao()->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } else {
      throw new \Exception("Nenhuma pessoa encontrada");
    }
  }
}
