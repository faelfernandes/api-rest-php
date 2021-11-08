<?php
namespace App\Controllers;

use App\Models\User;

class UserController
{
  public function get($id = null) {
    if ($id) {
      echo "Passou aqui";
      echo "<br>";
      echo "<br>";
      return User::getUser($id);
    } else {
      return User::getUsers();
    }
  }

  public function post() {
    
  }

  public function update() {
    
  }

  public function delete() {
    
  }
}