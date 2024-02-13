<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');   
    header('Access-Control-Allow-Method: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Method, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"),true);
    
    $student_id = $data['id'];
    
    include "config.php";

    $sql = "DELETE FROM student WHERE id = {$student_id}";
   
    if( mysqli_query($conn,$sql)){
        echo json_encode(array('message' => 'Student Record Deleted.','status' => true));

    }else{
        echo json_encode(array('message' => 'Student Record Not Deleted.','status' => false));
    }
?>