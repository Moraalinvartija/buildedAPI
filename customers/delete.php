<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
include('function.php');

$requestMethod = $_SERVER ["REQUEST_METHOD"];

if($requestMethod == "DELETE") { //set up delete.php so that no other methos are allowed (update,read etc)

        $deleteCustomer = deleteCustomer($_GET);
        echo $deleteCustomer;

 

} else {
    $data = [               //message that is send if method is anything else than DELETE                               
        'status' => 405,
        'message' => $requestMethod. ' Method not Allowed',

    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);    //encode it to JSON
}