<?php

require '../inc/dbcon.php';
function getCustomerList() {        //get all data from table 'customers' that is in database

    global $conn;

    $query = "SELECT * FROM customers";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        if(mysqli_num_rows($query_run) > 0) {  //execure this part if any data is found in 'customers' table

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [                           
                'status' => 200,
                'message' =>'Customer List Fetched Successfully',
                'data' => $res
        
            ];
            header("HTTP/1.0 200 Customer List Fetched Successfully");
            return json_encode($data);    //encode it to JSON

    
        } else {
            $data = [               //message that is send if 'customer' table is empty                           
                'status' => 404,
                'message' =>'No Customer Found',
        
            ];
            header("HTTP/1.0 404 No Customer Found");
            return json_encode($data);    //encode it to JSON
        }


    } else {
        $data = [               //message that is send if fetching data from table 'customers' doesnt succeed                               
            'status' => 500,
            'message' =>'Internal Server Error',
    
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);    //encode it to JSON
    }

}

function error422($message) {

    $data = [               //message that is send with error422                          
        'status' => 422,
        'message' => $message,

    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);    //encode it to JSON
    exit();

}
function storeCustomer($customerInput) {
    global $conn;

    $fname = mysqli_real_escape_string($conn, $customerInput['client_fname']);
    $lname = mysqli_real_escape_string($conn, $customerInput['client_lname']);
    $address = mysqli_real_escape_string($conn, $customerInput['client_address']);

    if(empty(trim($fname))) {

        return error422('Enter client first name');

    } elseif(empty(trim($lname))) {
        return error422('Enter client last name');

    } elseif(empty(trim($address))) {
        return error422('Enter client address');

    } else {
        $query = "INSERT INTO customers (client_fname, client_lname, client_address) VALUES ('$fname','$lname','$address')";
        $result = mysqli_query($conn, $query);

        if($result) {
            $data = [               //message that is send if storing customer is successfully                
                'status' => 201,
                'message' =>' Customer Created Successfully ',
        
            ];
            header("HTTP/1.0 201 Data Created");
            return json_encode($data);    //encode it to JSON

        } else {
            $data = [                                     
                'status' => 500,  //message that is send if storing customer has failed
                'message' =>' Internal Server Error',
        
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);    //encode it to JSON

        }
    }
    
}