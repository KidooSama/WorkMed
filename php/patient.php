<?
require_once "person.php";
class Patient extends Person{
    protected $date_surgery;
    protected $medical_history;
    protected $expenses;
    protected $type_surgery;
    protected $doctor;
    protected $insurance;

    public function setDateSurgery($dts){
        $this->date_surgery = $dts;
    }
    public function setMedicalHistory($mh){
        $this->medical_history = $mh;
    }
    public function setExpenses($exp){
        $this->expenses = $exp;
    }
    public function setTypeSurgery($mh){
        $this->type_surgery = $mh;
    }
    public function setDoctor($dct){
        $this->doctor = $dct;
    }
    public function setInsurance($ins){
        $this->insurance = $ins;
    }


    public function getDateSurgery(){
        return $this->date_surgery;
    }
    public function getMedicalHistory(){
        return $this->medical_history;
    }
    public function getExpenses(){
        return $this->expenses;
    }
    public function getTypeSurgery(){
        return $this->type_surgery;
    }
    public function getDoctor(){
        return $this->doctor;
    }
    public function getInsurance(){
        return $this->insurance;
    }
}



?>