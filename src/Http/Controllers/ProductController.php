<?php

namespace App\Http\Controllers;

use App\Http\Dao\ProductDao;
use App\Http\Models\Product;

class ProductController implements Controller
{
  public function get()
  {
    $product = ProductDao::all();
    $jsonstring = json_encode($product);
    echo $jsonstring;
    die();
  }

  public function post($request)
  {
    $product = new Product("", $request['name'], $request['description'], $request['price']);
    $product = ProductDao::add($product);

    if ($product > 0) {
      $data = json_decode(file_get_contents('php://input'), true);
      echo json_encode($data, header("Status: 201 Created"));
    }
    die();
  }

  public function put($request, $id)
  {
    $product = new Product($id, $request['name'], $request['description'], $request['price']);

    $product = ProductDao::update($product);

    if ($product > 0) {
      $data = json_decode(file_get_contents('php://input'), true);
      echo json_encode($data, header("Status: 200 Update"));
    }
    die();
  }
  
  public function delete($id)
  {
    // $product = dao->selectProduct($id);
    var_dump($id);
    die();
  }
}
