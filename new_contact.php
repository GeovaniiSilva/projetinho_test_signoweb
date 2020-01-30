<?php 
    include_once "./classes/contactdao.class.php";

    if($_POST){
        $contactDao = new contactDAO();
        $contact = new Contact();

        $required = array('name','email','phone');

        $error = false;
        foreach($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
        }
        }
        if($error){
            echo "Campos vazios são obrigatórios!";
        }else{
            $contact->set_name(trim($_POST['name']));
            $contact->set_email(trim($_POST['email']));
            $contact->set_phone(trim($_POST['phone']));
            $contact->set_birth(trim($_POST['birth']));
            $contact->set_address(trim($_POST['address']));

            if($contactDao->insert_contact($contact)){
            header("Location: http://localhost/teste/success.php");
            }else{
            echo "Alguns campos contem erros.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cadastrar contato</title>
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                Nome: <input type="text" name="name" id="name"> <br>
                Email: <input type="text" name="email" id="email"> <br>
                Fone: <input type="text" name="phone" id="phone"> <br>
                Nasc: <input type="text" name="birth" id="birth"> <br>
                Endereço: <input type="text" name="address" id="address"> <br>
                <input type="submit" value="Salvar" class="actions">
            </form>
        </div>
        <div class="buttons">
            <a href="/teste" class="btn btn-primary"><button class="actions">Voltar</button></a>
        </div>
        <?php include_once "templates/footer.php"; ?>
    </body>
</html>