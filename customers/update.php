<?php
error_reporting(0);
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
include('function.php');

$requestMethod = $_SERVER ["REQUEST_METHOD"];

if($requestMethod == 'PUT') {

    $inputData = json_decode(file_get_contents("php://input"), true);
    
        $updateCustomer = updateCustomer($inputData, $_GET); //for raw data
        echo $updateCustomer;
   
    

} else {
    $data = [               //message that is send if method is anything else than POST                              
        'status' => 405,
        'message' => $requestMethod. ' Method not Allowed',

    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);    //encode it to JSON
}
