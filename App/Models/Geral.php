<?php

namespace App\Models;

class Geral
{
  private static $table = 'cartao';

  public static function listarPorId(int $id)
  {
    $connPdo = new \PDO(DBDRIVE . ': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
    // SELECT * FROM usuario AS U INNER JOIN ' . self::$table . ' AS C ON C.usuario_id = U.id WHERE U.id = :id ORDER BY U.id ASC
    $sql = 'SELECT * FROM usuario AS U INNER JOIN ' . self::$table . ' AS C ON C.usuario_id = U.id WHERE U.id = :id ORDER BY U.id ASC';
    $stmt = $connPdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return $stmt->fetch(\PDO::FETCH_ASSOC);
    } else {
      throw new \Exception("Nenhum dado encontrado");
    }
  }

  public static function listarGeral()
  {
    $connPdo = new \PDO(DBDRIVE . ': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);

    $sql = 'SELECT * FROM usuario AS U INNER JOIN ' . self::$table . ' AS C ON C.usuario_id = U.id ORDER BY U.id ASC';
    $stmt = $connPdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } else {
      throw new \Exception("Nenhum dado encontrado");
    }
  }
}
