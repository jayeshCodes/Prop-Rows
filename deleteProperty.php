<?php 

include_once "connection.php";
session_start();

if (!(isset($_SESSION['agent_id']) && isset($_SESSION['agent_email']))) {
	header("Location: index.php");
     exit();
}

	
      // $sql = "INSERT INTO properties (property_title, property_details, delivery_type, availablility, price, property_address, bed_room, liv_room, parking, kitchen, utility, property_type, floor_space, agent_id) VALUES ( '$property_title','$property_details','$delivery_type', $availability, $price, '$property_address', $bed_room, $liv_room, $parking, $kitchen, '$utility', '$property_type', '$floor_space', $agent_id)";
      $property_id = $_POST['property_id'];
	$sql = "DELETE FROM properties where property_id=$property_id";
        $result = mysqli_query($con, $sql);

        

		if($result){
                header("Location: agentPortal.php");

                exit();

        }else{

            header("Location: agentPortal.php?error=Error Occured");

            exit();

        }

?>


