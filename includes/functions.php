<?php

require "configuration.php";

if(isset($_GET["logout"])){

    // logout logic
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();

}elseif(isset($_POST["login_submit"])){
    
    // login logic
    $loginEmail = $_POST["email"];
    $loginPassword = $_POST["password"];  

    $filteredEmail = filter_var($loginEmail, FILTER_VALIDATE_EMAIL);
    $filteredPassword = trim($loginPassword);
    $filteredPassword = htmlspecialchars($filteredPassword);
    $filteredPassword = strip_tags($filteredPassword);

    if($filteredEmail){
        $loginQuery = $connection->prepare("SELECT id FROM admin_details WHERE email = :email AND password = :password");
        $loginQuery->bindParam(":email", $filteredEmail);
        $loginQuery->bindParam(":password", $filteredPassword);
        $loginQuery->execute();
    }else{
        header("Location: ../login.php?login_failed=1");
    }
    
    $loginResult = $loginQuery->fetchAll(PDO::FETCH_ASSOC);
    if(count($loginResult) > 0){
        session_start();
        $_SESSION["authentication"] = "authorized";
        header("Location: ../admin");
    }else{
        header("Location: ../login.php?login_failed=1");
    echo $filteredEmail;
    echo "</br>";
    echo $filteredPassword;
    }

}else{
    header("Location: ../login.php");
}



?>