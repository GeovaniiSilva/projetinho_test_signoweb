<?php
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    /*Script que faz a busca de um contato específico no banco de dados por meio da classe ContactDAO*/


    include_once "./classes/contactdao.class.php";

    $contactDao = new contactDAO();
    $contact = $contactDao->detail_contact($id=$_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php if ($contact){ echo $contact->get_name(); }else{ echo "No contact!";} ?></title>
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
            <div class="contact">
                <?php if($contact){ ?>
                    <h2><?php echo ucwords($contact->get_name()); ?></h2>
                    <p>Email: <?php echo $contact->get_email(); ?></p>
                    <p>Telefone: <?php echo $contact->get_email(); ?></p>
                    <p>Nascimento: <?php echo $contact->get_birth(); ?></p>
                    <p>Endereço: <?php echo $contact->get_email(); ?></p>
                <?php }?>
            </div>    
        </div>
        <div class="buttons">
            <a href="/teste" class="btn btn-primary"><button class="actions">Voltar</button></a>
            <?php echo "<a href='/teste/edit_contact.php/?id=".$contact->get_id()."'><button class='actions'>Editar</button></a>"; ?>
            <a href=""><button class="actions">Deletar</button></a>
        </div>
        <?php include_once "templates/footer.php"; ?>
    </body>
</html>
