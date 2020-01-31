<?php
    include_once "./classes/contactdao.class.php";

    $contactDao = new ContactDAO();
    $contact = $contactDao->detail_contact($_GET['id']);
    
    if($_POST){
        $required = array('name','email','phone');

        $error = false;
        $date_birth = null;
        $phone_contact = null;
        $errors = "obrigatórios [";

        $date_birth = str_replace("/", "-", $_POST['birth']);
        $date_birth = date('Y-m-d', strtotime($_POST['birth']));

        foreach($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
            $errors .= $field." ";
        }
        }
        $errors .= "]";

        if(!$errors){
            $contact->set_name($_POST['name']);
            $contact->set_email($_POST['email']);
            $contact->set_phone($_POST['phone']);
            $contact->set_birth($date_birth);
            $contact->set_address($_POST['address']);

            if($contactDao->update_contact($contact)){
                header("Location: http://localhost/teste/success.php");
            }else{
                header("Location: http://localhost/teste/new_contact.php");
            }
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Atualizar contato <?php echo $contact->get_name(); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/teste/css/header.css">
        <link rel="stylesheet" href="/teste/css/index.css">
        <link rel="stylesheet" href="/teste/css/footer.css">
    </head>
    <body>
        <?php
            include_once "templates/header.php";
        ?>
        <div class="content">
            <h2>Atualizar contato</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$contact->get_id()}");?>" method="POST">
                Nome: <input type="text" name="name" id="name" value='<?php echo $contact->get_name(); ?>'> <br>
                Email: <input type="text" name="email" id="email" value='<?php echo $contact->get_email(); ?>'> <br>
                Fone: <input type="text" name="phone" id="phone" value='<?php echo $contact->get_phone(); ?>'> <br>
                Nasc: <input type="text" name="birth" id="birth" value='<?php echo $contact->get_birth(); ?>'> <br>
                Endereço: <input type="text" name="address" id="address" value='<?php echo $contact->get_address(); ?>'> <br>
                <input type="submit" value="Salvar">
            </form>
        </div>
        <div class="buttons">
        <a href="/teste"><button class="actions">Voltar</button></a>
        </div>
    </body>
</html>