<?
require_once "person.php";
class Doctor extends Person{
    protected $speciality;
    protected $crm;
    
    public function setSpeciality($spe){
        $this->speciality = $spe;
       }
       public function setCrm($crm){
        $this->crm = $crm;
       }
       public function getSpeciality(){
        return $this->speciality;
       }
       public function getCrm(){
        return $this->crm;
       }
}




?>