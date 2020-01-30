<?php


include_once "connection.class.php";
include_once "contact.class.php";


class ContactDAO {
    //Classe ContatoDAO com as funções de acesso aos dados no banco de dados

    private $connection = null;

    function __construct(){
        $this->connection = new Connection();
    }

    //Função que lista os contatos
    public function list_contacts(){
        $result = $this->connection->get_connection()->query("select * from contact;");
        $contacts = array();
        while($data = $result->fetch(PDO::FETCH_ASSOC)){
            $contact = new Contact();
            $contact->set_id($data['id']);
            $contact->set_name($data['name']);
            $contact->set_email($data['email']);
            $contact->set_phone($data['phone']);
            $contact->set_birth($data['birth']);
            $contact->set_address($data['address']);
            array_push($contacts, $contact);
        }
        return $contacts;
    }

    //Função que busca um contato específico
    public function detail_contact($id){
        $contact = new Contact();
        try{
            $result = $this->connection->get_connection()->prepare('select * from contact where id = :id');
            $result->execute(array(
                ':id' => $id
            ));
            
            while($data = $result->fetch(PDO::FETCH_ASSOC)){
                
                $contact->set_id($data['id']);
                $contact->set_name($data['name']);
                $contact->set_email($data['email']);
                $contact->set_phone($data['phone']);
                $contact->set_birth($data['birth']);
                $contact->set_address($data['address']);
            }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        return $contact;
    }

    public function insert_contact($contact){
        try{
            $stmt = $this->connection->get_connection()->prepare('insert into contact(name,email,phone,birth,address) values(:name, :email, :phone, :birth, :address)');
            $stmt->execute(array(
                ':name' => $contact->get_name(),
                ':email' => $contact->get_email(),
                ':phone' => $contact->get_phone(),
                ':birth' => $contact->get_birth(),
                ':address' => $contact->get_address()
            ));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function update_contact($contact){
        try{
            $stmt = $this->connection->get_connection()->prepare('update contact set name=:name, email=:email, phone=:phone, birth=:birth, address=:address where id=:id');
            $stmt->execute(array(
                ':id' => $contact->get_id(),
                ':name' => $contact->get_name(),
                ':email' => $contact->get_email(),
                ':phone' => $contact->get_phone(),
                ':birth' => $contact->get_birth(),
                ':address' => $contact->get_address()
            ));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

}

?>