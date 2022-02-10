<?php 

session_start(); 

include_once "connection.php";


if (isset($_POST['agent_email']) && isset($_POST['password'])) {
	
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $agent_email = validate($_POST['agent_email']);

    $password = validate($_POST['password']);

    if (empty($agent_email)) {

        header("Location: index.php?error=Email is required");

        exit();

    }else if(empty($password)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM agent WHERE agent_email='$agent_email' AND password='$password'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['agent_email'] === $agent_email && $row['password'] === $password) {

                echo "Logged in!";

                $_SESSION['agent_name'] = $row['agent_name'];
				$_SESSION['agent_id'] = $row['agent_id'];
				$_SESSION['agent_contact'] = $row['agent_contact'];
                $_SESSION['agent_email'] = $row['agent_email'];


                header("Location: agentPortal.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect Email or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect Email or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}


