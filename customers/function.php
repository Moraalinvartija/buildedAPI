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