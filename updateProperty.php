<?php 

include_once "connection.php";
session_start();

if (!(isset($_SESSION['agent_id']) && isset($_SESSION['agent_email']))) {
	header("Location: index.php");
     exit();
}
$agent_id = $_SESSION['agent_id'];

	$property_id = $_POST['property_id'];
	$property_title = $_POST['property_title'];
	$property_details = $_POST['property_details'];
			$delivery_type = $_POST['delivery_type'];
			$availablility = $_POST['availablility'];
			$price = $_POST['price'];
			$bed_room = $_POST['bed_room'];
			$liv_room = $_POST['liv_room'];
			$parking = $_POST['parking'];
			$property_type = $_POST['property_type'];
			$kitchen = $_POST['kitchen'];
			$utility = $_POST['utility'];
			$floor_space = $_POST['floor_space'];
			$property_address = $_POST['property_address'];

  
	
      // $sql = "INSERT INTO properties (property_title, property_details, delivery_type, availablility, price, property_address, bed_room, liv_room, parking, kitchen, utility, property_type, floor_space, agent_id) VALUES ( '$property_title','$property_details','$delivery_type', $availability, $price, '$property_address', $bed_room, $liv_room, $parking, $kitchen, '$utility', '$property_type', '$floor_space', $agent_id)";
      $sql = "DELETE FROM properties where property_id=$property_id";
      $result = mysqli_query($con, $sql);
     if(!$result){
                header("Location: agentPortal.php?error=Error Occured");
            exit();

        }
	$sql = "INSERT INTO properties (property_title, property_details, delivery_type, availablility, price,bed_room,liv_room, parking, kitchen,  agent_id, property_type, floor_space, utility, property_address) VALUES ('$property_title','$property_details','$delivery_type', $availablility, $price, $bed_room, $liv_room, $parking, $kitchen,$agent_id, '$property_type', '$floor_space', '$utility', '$property_address')";
        $result = mysqli_query($con, $sql);

        

		if($result){
                header("Location: agentPortal.php");

                exit();

        }else{

            header("Location: agentPortal.php?error=Error Occured");

            exit();

        }
?>


