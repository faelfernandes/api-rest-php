<?php

namespace App\Models;

use App\Models\Cartao;
use App\Models\Pessoa;

class Geral
{
  public static function listarPorId(int $id)
  {
    $connPdo = new \PDO(DBDRIVE . ': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
    // SELECT U.id, U.nome, U.cpf, U.data_de_nascimento, C.bandeira, C.numero, C.expiracao, C.cvv FROM ' . self::$table . ' AS C INNER JOIN usuario AS U ON C.usuario_id = U.id ORDER BY U.id ASC
    $sql = 'SELECT U.id, U.nome, U.cpf, U.data_de_nascimento, C.bandeira, C.numero, C.expiracao, C.cvv FROM ' . self::$table . ' AS C INNER JOIN usuario AS U ON C.usuario_id = U.id  WHERE U.id = :id ORDER BY U.id ASC';
    $stmt = $connPdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return $stmt->fetch(\PDO::FETCH_ASSOC);
    } else {
      throw new \Exception("Nenhum cartão encontrado");
    }
  }

  public static function listarGeral()
  {
    $connPdo = new \PDO(DBDRIVE . ': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);

    $sql = 'SELECT U.id, U.nome, U.cpf, U.data_de_nascimento, C.bandeira, C.numero, C.expiracao, C.cvv FROM ' . self::$table . ' AS C INNER JOIN usuario AS U ON C.usuario_id = U.id ORDER BY U.id ASC';
    $stmt = $connPdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } else {
      throw new \Exception("Nenhum cartão encontrado");
    }
  }
}
