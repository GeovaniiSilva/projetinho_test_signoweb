<?php
    include_once "./classes/contactdao.class.php";

    $contactDao = new contactDAO();
    $contacts = $contactDao->list_contacts();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contatos</title>
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
            <a href="new_contact.php" ><button class="new_contact">Novo</button></a>
            
            <div>
                <?php
                    if($contacts){ ?>
                        <table class="table_contacts">
                            <thead>
                                <tr>
                                    <th>Nome</th><th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($contacts as $key => $contact){ ?>
                                    <tr>
                                        <td><?php echo "<a href='contact.php/?id=".$contact->get_id()."'>".$contact->get_name()."</a>"; ?></td>
                                        <td><?php echo $contact->get_email(); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <h2>Sem contatos</h2>                   
                <?php } ?>      
            </div>
        </div>
        <?php include_once "templates/footer.php"; ?>
    </body>
</html>