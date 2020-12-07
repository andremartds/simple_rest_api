<?php

namespace App\Http\Dao;

use App\config\PDOUtil;
use App\Http\Models\Product;
use PDO;

class ProductDao
{
  public static function add(Product $product)
  {
    $insert = PDOUtil::getStance()->prepare("INSERT INTO products(name, description, price) VALUES(:name, :description, :price)");
    $insert->bindValue(":name", $product->getName());
    $insert->bindValue(":description", $product->getDescription(), PDO::PARAM_STR);
    $insert->bindValue(":price", $product->getPrice(), PDO::PARAM_STR);
    $insert->execute();
    return PDOUtil::getStance()->lastInsertId();
  }

  public static function all()
  {
    $consulta = PDOUtil::getStance()->prepare("SELECT * FROM products");
    $consulta->execute();
    $result = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }

  public static function update(Product $product)
  {
    $insert = PDOUtil::getStance()->prepare("UPDATE products SET name=:name, description=:description, price=:price WHERE id=:id");
    $insert->bindValue(":id", $product->getId());
    $insert->bindValue(":name", $product->getName());
    $insert->bindValue(":description", $product->getDescription(), PDO::PARAM_STR);
    $insert->bindValue(":price", $product->getPrice(), PDO::PARAM_STR);
    $insert->execute();
  }

  public static function delete($id)
  {
    self::select($id);
    $stmt = PDOUtil::getStance()->prepare("DELETE FROM products where id=:id");
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    return $stmt;
  }

  public static function select($id)
  {
    $consulta = PDOUtil::getStance()->prepare("SELECT * FROM products where id=:id");
    $consulta->bindValue(":id", $id);
    $consulta->execute();
    $product = $consulta->fetch(PDO::FETCH_OBJ);
    if (isset($product->id)) {
      return $product;
    } else {
      echo json_encode('id does not was found');
      die();
    }
  }
}
