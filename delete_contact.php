<?php

include_once "classes/contactdao.class.php";

$contactdao = new ContactDAO();
if($contactdao->delete_contact($_POST['id'])){
    header("Location: http://localhost/teste/");
}
