<?php 
    include_once "./classes/contactdao.class.php";

    if($_POST){
        $contactDao = new contactDAO();
        $contact = new Contact();

        $required = array('name','email','phone');

        $error = false;
        $date_birth = null;
        $phone_contact = null;
        $errors = "obrigatórios [";

        $date_birth = str_replace("/", "-", $_POST['birth']);
        $date_birth = date('Y-m-d', strtotime($date_birth));


        foreach($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
            $errors .= $field." ";
        }
        }
        $errors .= "]";

        if(!$error){
            
            $contact->set_name(trim($_POST['name']));
            $contact->set_email(trim($_POST['email']));
            $contact->set_phone(trim($_POST['phone']));
            $contact->set_birth($date_birth);
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
            <h2>Registrar contato</h2>
            <?php if(isset($errors)){  ?>
                <ul>
                    <?php echo "<li>". $errors . "</li>" ?>
                </ul>
            <?php  } ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form">
                Nome completo <input type="text" name="name" id="name"> <br>
                Email <input type="email" name="email" id="email"> <br>
                Telefone <input type="fone" name="phone" id="phone"
                onkeyup="
                    var v = this.value;
                    if (v.match(/^\d{2}$/) !== null) {
                        this.value = v + '-';
                    }"
                    maxlength="12" placeholder="11-11111-1111"> <br>
                Data de Nascimento <input type="text" name="birth" id="birth"
                onkeyup="
                    var v = this.value;
                    if (v.match(/^\d{2}$/) !== null) {
                        this.value = v + '/';
                    } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                        this.value = v + '/';
                    }"
                    maxlength="10" placeholder="dd-mm-aaaa"> <br>
                Endereço completo <input type="text" name="address" id="address"> <br>
                <input type="submit" value="Salvar" class="actions">
            </form>
        </div>
        <div class="buttons">
            <a href="/teste"><button class="actions">Voltar</button></a>
        </div>
        <?php include_once "templates/footer.php"; ?>
    </body>
</html>