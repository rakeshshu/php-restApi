<?php 

    header('Content-Type: application/json');
    header('Acess-Control-Allow-Origin: *');   

    $data = json_decode(file_get_contents("php://input"),true);
    
    $search_value = $data['search'];
   
    include "config.php";

    $sql = "SELECT * FROM student1 WHERE fname LIKE '%{$search_value}%' or lname LIKE '%{$search_value}%'";
    
    $result = mysqli_query($conn,$sql) or die("Sql Query Failed");

    if( mysqli_num_rows($result) > 0){
        $output =  mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($output);

    }else{
        echo json_encode(array('message' => 'No Search Found.','status' => false));
    }
?>