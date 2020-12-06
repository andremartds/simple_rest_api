<?php
namespace App\Http\Controllers;

interface Controller
{
  public function get();

  public function post($request);

  public function put($id, $request);
  
  public function delete($id);

}
