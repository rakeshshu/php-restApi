<?php 

    header('Content-Type: application/json');
    header('Acess-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Method: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Method, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"),true);
    $sname = $data['sfname'];
    $lname = $data['slname'];
    include "config.php";

    $sql = "INSERT INTO student(fname, lname) VALUES ('{$sname }','{$lname}')";

    if(mysqli_query($conn,$sql)){
        echo json_encode(array('message' => 'Student Record Inserted.','status' => true));

    }else{
        echo json_encode(array('message' => 'Student Record Not Inserted.','status' => false));
    }
?>