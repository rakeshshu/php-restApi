<?php
header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Method: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Method, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"),true);
    $id = $data['sid'];
    $sname = $data['sfname'];
    $lname = $data['slname'];
    include "config.php";

    $sql = "UPDATE student1 SET fname = '{$sname}', lname = '{$lname}' WHERE id = {$id}";

    if(mysqli_query($conn,$sql)){
        echo json_encode(array('message' => 'Student Record Updated.','status' => true));

    }else{
        echo json_encode(array('message' => 'Student Record Not Updated.','status' => false));
    }
?>