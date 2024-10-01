<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();
function decodeId($index) {
    $number = 0;
    $arrayNumber = [];
    $array = explode('-', $index);
    $decodeTable = [
        'Z99X' => 0,
        'A12B' => 1,
        '&BUYG' => 2,
        'PQR4' => 3,
        '%$#@!' => 4,
        '3GH6D' => 5,
        'N7OP8' => 6,
        '^&*E' => 7,
        'KLM9' => 8,
        ')(*YH' => 9,
        ];
    for ($i = 0; $i < count($array); $i++) {
        if (isset($decodeTable[$array[$i]])) { 
            $arrayNumber[$i] = $decodeTable[$array[$i]];
        } else {
            $arrayNumber[$i] = null;
        }
    }
    $index = 10;
    for ($i = 0; $i < count($arrayNumber); $i++) {
        if(isset($arrayNumber[$i])) {
            if($i !== 0){
                $number *= $index;
                $number += $arrayNumber[$i];
                $index*=$index;
            }else{
                $number += $arrayNumber[$i];
            }
        }
    }

    return $number;
}

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = decodeId($_GET['id']);
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>