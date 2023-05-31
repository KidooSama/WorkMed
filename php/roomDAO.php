<?php
require_once 'Conexao.php';
require_once 'room.php';   
class RoomDAO {

    public function create (Room $room) {
        $sql = 'INSERT INTO  room (name, location,type_surgeries,description) VALUES (?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $room->getName());
        $stmt->bindValue(2, $room->getLocation());
        $stmt->bindValue(3, $room->getTypeSurgeries());
        $stmt->bindValue(4, $room->getDescription());
        $stmt->execute();
        $id = Conexao::getConn()->lastInsertid('room');
        $room->setId($id);
    }

    public function read(){
        $sql = 'SELECT * FROM room';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $rooms = [];
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($resultado as $row) {
                $room = new Room($row['name'],$row['location'],$row['type_surgeries'],$row['description']);
                $room->setId($row['id']);
                $rooms[] = $room;
            }
        }else {
            echo '<img src="../Components/SVG/nodata.svg" class="img-bnr" alt="Sem itens na lista">';
            echo '<p>Não há itens na lista.</p>';
        }
        return $rooms;
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
        $sql = 'DELETE FROM room WHERE id = ?';
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

