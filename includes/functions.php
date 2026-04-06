<?php

session_start();

require "configuration.php";

if(isset($_GET["logout"])){

    // logout logic
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();

}

if(isset($_POST["login_submit"])){
    
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
        $_SESSION["authentication"] = $loginResult[0]['id'];
        header("Location: ../admin");
        exit();
    }else{
        header("Location: ../login.php?login_failed=1");
        echo $filteredEmail;
        echo "</br>";
        echo $filteredPassword;
    }
}

if(isset($_POST['publish_post']) || isset($_POST['save_post'])){
    $title = $_POST["blog_title"];
    if(empty($title)){
        header("Location: ../admin/post.php?publish_failed=1");
        exit();
    }

    $category = $_POST["blog_category"];
    if ($category != "Technology" && $category != "Real Estate" && $category != "Career Development" && $category != "Smart Home Tech" && $category != "Space" && $category != "Physics" && $category != "Fashion" && $category != "Geography" && $category != "Mental Well-being") {
        header("Location: ../admin/post.php?publish_failed=1");
        exit();
    }

    $trending = $_POST["blog_trending"];
    if($trending != 0 && $trending != 1){
        header("Location: ../admin/post.php?publish_failed=1");
        exit(); 
    }

    $text = $_POST["blog_text"];
    if(empty($text)){
        header("Location: ../admin/post.php?publish_failed=1");
        exit();
    }

    $file = $_FILES["blog_image"];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'avif'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        header("Location: ../admin/post.php?publish_failed=1");
        exit();
    }
    
    if(isset($file) && $file['error'] == 0){
        $imageName = time() . "_" . $file['name'];
        move_uploaded_file($file['tmp_name'], "../assets/img/upload/".$imageName);
    }else{
        header("Location: ../admin/post.php?publish_failed=1");
        exit();
    }

    $date = date('d F Y');

    $findingAuthor = $connection->prepare("SELECT full_name FROM admin_details WHERE id= :authorID");
    $findingAuthor->bindParam(":authorID", $_SESSION['authentication']);
    $findingAuthor->execute();
    $fetchAuthorName = $findingAuthor->fetchAll(PDO::FETCH_ASSOC);
    if(count($fetchAuthorName) > 0){
        $author = $fetchAuthorName[0]['full_name'];
    }else{
       header("Location: ../admin/post.php?publish_failed=1");
       exit();
    }
    
    if(isset($_POST['publish_post'])){
        $status = 1;
    }
    if(isset($_POST['save_post'])){
        $status = 0;
    }

    $views = 0;

    try {
        $insertStmt = $connection->prepare("INSERT INTO blog_post (title, blog, image, category, date, author, views, status, trending) VALUES (:title, :blog, :image, :category, :date, :author, :views, :status, :trending)");
        
        $insertStmt->bindParam(':title', $title);
        $insertStmt->bindParam(':blog', $text);
        $insertStmt->bindParam(':image', $imageName);
        $insertStmt->bindParam(':category', $category);
        $insertStmt->bindParam(':date', $date);
        $insertStmt->bindParam(':author', $author);
        $insertStmt->bindParam(':views', $views);
        $insertStmt->bindParam(':status', $status);
        $insertStmt->bindParam(':trending', $trending);

        if($insertStmt->execute()){
            header("Location: ../admin/index.php");
            exit();
        } else {
            header("Location: ../admin/post.php?publish_failed=1");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: ../admin/post.php?publish_failed=1");
        exit();
    }

}

?>