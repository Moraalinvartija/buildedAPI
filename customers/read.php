<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
include('function.php');

$requestMethod = $_SERVER ["REQUEST_METHOD"];

if($requestMethod == "GET") { //set up read.php so that no other methos are allowed (update,delete etc)

    $customerList = getCustomerList();
    echo $customerList;

} else {
    $data = [               //message that is send if method is anything else than GET                               
        'status' => 405,
        'message' => $requestMethod. ' Method not Allowed',

    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);    //encode it to JSON
}