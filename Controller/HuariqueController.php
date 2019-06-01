<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// requires
require_once '../Model/Huarique.php';

$op = htmlentities($_REQUEST['op']);
$data = json_decode(file_get_contents("php://input"));

switch ($op) {
  case 1: {
    //Object Declarations
    $list = [];
    $objHuarique = new Huarique();
    if (isset($data)) {
      $region = filter_var($data->region, FILTER_SANITIZE_NUMBER_INT);
      $objHuarique->set('region', $region);
      $list = $objHuarique->all();
    }
    $objHuarique->closeConnection();
    echo json_encode($list);
    break;
  }
  case 2: {
    //Object Declarations
    $list = [];
    $objHuarique = new Huarique();
    $list = $objHuarique->allByRating();
    $objHuarique->closeConnection();
    echo json_encode($list);
    break;
  }
}