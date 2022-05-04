<?php
// This file contains a bridge between the view and the model and redirects back to the proper page
// with after processing whatever form this code absorbs. This is the C in MVC, the Controller.
//
// Authors: Rick Mercer and Ali Elbekov
//  
session_start (); // Not needed until a future iteration

require_once './DatabaseAdaptor.php';

$theDBA = new DatabaseAdaptor();

if (isset ( $_GET ['todo'] ) && $_GET ['todo'] === 'getQuotes') {
    $arr = $theDBA->getAllQuotations();
    unset($_GET ['todo']);
    echo getQuotesAsHTML ( $arr );
}else if(isset ($_POST ['author']) && isset ($_POST ['quote'])){
    $author = $_POST ['author'];
    $quote = $_POST ['quote'];    
    $theDBA->addQuote($quote, $author); 
    header ( "Location: view.php" );
}else if(isset ($_POST ['update'])){
    $clickedName = $_POST['update'];
    $ID = $_POST['ID'];
    if($clickedName === 'increase'){
        $theDBA->raiseRating($ID);      
    }else if($clickedName === 'decrease'){
        $theDBA->lowerRating($ID);
    }else if ($clickedName === 'delete')
        $theDBA->deleteQuote($ID);
    header ( "Location: view.php" );
}else if(isset ($_POST ['register'])){
    $newUserName = $_POST ['userName'];
    $newPassword = $_POST ['password'];
    $currentUsers = $theDBA->getAllUsers();
    for($i=0; $i<count($currentUsers); $i++){
        if($currentUsers[$i]['username'] == $newUserName){
            $_SESSION ['errorMessage'] = "This username is already taken.";
            header ( "Location: register.php" );
       }
    }
    if(!isset($_SESSION ['errorMessage'])){            
        $theDBA->addUser($newUserName, $newPassword);
        header ( "Location: view.php" );
    }
}else if(isset ($_POST ['login'])){
        $userName = $_POST ['userName'];
        $password = $_POST ['password'];       
        if($theDBA ->verifyCredentials($userName, $password)){
            $_SESSION['user'] = $userName;
            header ( "Location: view.php" );  
        }else{
            $_SESSION['loginError'] = "Invalid Account/Password";
            header ( "Location: login.php" );   
        }  
}



function getQuotesAsHTML($arr) {
    $result = '';
    foreach ($arr as $quote) {
        $result .= '<div class="containerMine">';
        $result .= '"' . $quote ['quote'] . '"<br>';
        $result .= '<p class= "author">&nbsp;&nbsp;--';
        $result .= $quote ['author']."<br></p>";
        $result .= '<form action = "controller.php" method="post">';
        $result .= '<input type="hidden" value="'.$quote['id'].'" name = "ID" id="'.$quote['id'].'"&nbsp;&nbsp;&nbsp;</input>';
        $result .= '<button name = "update" value = "increase">+</button>&nbsp;&nbsp;';
        $result .= '<span id = "rating">' .$quote['rating']. '</span>&nbsp;&nbsp;';
        $result .= '<button name = "update" value = "decrease">-</button>&nbsp;&nbsp;';
        $result .=  '<button name =  "update" value =  "delete">Delete</button></form></div></div>';
    }
    return json_encode($result);
}
?>