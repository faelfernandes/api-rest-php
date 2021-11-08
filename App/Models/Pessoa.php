<?php

namespace App\Models;

class Pessoa
{
  private static $table = 'usuario';

  public static function listarPessoa(int $id)
  {
    $connPdo = new \PDO(DBDRIVE . ': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
    
    $sql = 'SELECT * FROM ' . self::$table . ' WHERE id = :id';
    $stmt = $connPdo->prepare($sql);
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
    $connPdo = new \PDO(DBDRIVE . ': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
    
    $sql = 'SELECT * FROM ' . self::$table;
    $stmt = $connPdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } else {
      throw new \Exception("Nenhuma pessoa encontrada");
    }
  }
}
