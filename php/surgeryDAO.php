<?php
require_once 'Conexao.php';
require_once 'surgery.php';   
class SurgeryDAO {

    public function create (Surgery $surgery) {
        $sql = 'INSERT INTO  surgery (name, description) VALUES (?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $surgery->getName());
        $stmt->bindValue(2, $surgery->getDescription());
        $stmt->execute();
        $id = Conexao::getConn()->lastInsertid('surgery');
        $surgery->setId($id);
    }

    public function read(){
        $sql = 'SELECT * FROM surgery';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $surgerys = [];
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($resultado as $row) {
                $surgery = new Surgery($row['name'],$row['description']);
                $surgery->setId($row['id']);
                $surgerys[] = $surgery;
            }
        }else {
            // echo '<img src="../Components/SVG/nodata.svg" alt="Sem itens na lista">';
            echo '<p>Não há itens na lista.</p>';
        }
        return $surgerys;
    }

    
    public function SurgeryNames(){
        $sql = 'SELECT name FROM surgery';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $names = [];
        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $names[] = $row['name'];
            }
        }
        return $names;
    }
    

    public function delete($id) {
        $sql = 'DELETE FROM surgery WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }


//     public function update(Doctor $doctor) {
//         $sql = 'UPDATE doctor SET name=?, speciality=?, gender=?, crm=?, number=?, cpf=?, date=?, adress=? WHERE id=?';
//         $stmt = Conexao::getConn()->prepare($sql);
//         $stmt->bindValue(1, $doctor->getName());
//         $stmt->bindValue(2, $doctor->getSpeciality());
//         $stmt->bindValue(3, $doctor->getGen());
//         $stmt->bindValue(4, $doctor->getCrm());
//         $stmt->bindValue(5, $doctor->getNum());
//         $stmt->bindValue(6, $doctor->getCpf());
//         $stmt->bindValue(7, $doctor->getDate());
//         $stmt->bindValue(8, $doctor->getAdr());
//         $stmt->bindValue(9, $doctor->getId());
//         $stmt->execute();
// }

}

