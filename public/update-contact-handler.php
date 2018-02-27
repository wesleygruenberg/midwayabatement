<?php
session_start();
require_once('Dao.php');
require_once('session-handler-functions.php');

$notes = $_POST['notes'];
$resolved = $_POST['resolved'];
$id = $_POST['id'];
$page = $_POST['page'];
$errors = array();


if(!valid_length($notes, 0, 1000)){
    $errors['notes'] = "notes must be less than 1000 characters.";

}

if(empty($errors)) {

    echo "no errors";

    try{
        $dao = new Dao();

            echo "a user";
            if($dao->updateContact($id, $resolved, $notes)){
                echo "gotcha";
                var_dump($notes);
                var_dump($id);
                var_dump($resolved);

                redirectSuccess($page);
            }else{
                echo "shit";
            }

    } catch (Exception $e) {
        echo "dao problems";
        $errors['message'] = "Hmmm, something went wrong.  Please try again.";

        die;
    }
}
?>

