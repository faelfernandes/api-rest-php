<?php

namespace App;

class Conexao
{
  # Variável que guarda a conexão PDO.
  protected static $db;

  # Private construct - garante que a classe só possa ser instanciada internamente.
  private function __construct()
  {
    try {
      # Atribui o objeto PDO à variável $db.
      self::$db = new \PDO(DBDRIVE . ": host=" . DBHOST . "; dbname=" . DBNAME, DBUSER, DBPASS);
      # Garante que o PDO lance exceções durante erros.
      self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      # Garante que os dados sejam armazenados com codificação UFT-8.
      self::$db->exec('SET NAMES utf8');
    } catch (\PDOException $e) {
      # Então não carrega nada mais da página.
      die("Connection Error: " . $e->getMessage());
    }
  }

  public static function conexao()
  {
    if (!self::$db) {
      new Conexao();
    }
    # Retorna a conexão.
    return self::$db;
  }
}
