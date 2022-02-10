<?php 

session_start(); 

include_once "connection.php";


if (isset($_POST['agent_email']) && isset($_POST['password']) && isset($_POST['agent_name']) && isset($_POST['agent_address']) && isset($_POST['agent_contact']) &&  isset($_POST['pass_confirm'])) {
	
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $agent_email = validate($_POST['agent_email']);

    $password = validate($_POST['password']);
    $agent_name = validate($_POST['agent_name']);
    $agent_contact = validate($_POST['agent_contact']);
    $agent_address = validate($_POST['agent_address']);
    $pass_confirm = validate($_POST['pass_confirm']);

    if (empty($agent_email)) {

        header("Location: register.php?error=Email is required");

        exit();

    }else if(empty($password)){

        header("Location: register.php?error=Password is required");

        exit();

    }
    else if (empty($agent_contact)) {

        header("Location: register.php?error=Contact is required");

        exit();

    }else if(empty($agent_address)){

        header("Location: register.php?error=Address is required");

        exit();

    }
     if (empty($agent_name)) {

        header("Location: register.php?error=Name is required");

        exit();

    }else if(empty($pass_confirm)){

        header("Location: register.php?error=Confirm Password is Required");

        exit();

    }
    else if($pass_confirm != $password){

        header("Location: register.php?error= Password don't Match");

        exit();

    }
    else{

        $sql = "Insert into agent(agent_name, agent_contact, agent_email, agent_address, password) values ('$agent_name', '$agent_contact', '$agent_email', '$agent_address', '$password')";

        $result = mysqli_query($con, $sql);

		if($result){
            header("Location: index.php?success=successRegistration");  
	exit();
        }else{

            header("Location: register.php?error=Incorect Email or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}


