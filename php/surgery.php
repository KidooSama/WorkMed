<?

class Surgery{
    protected $name;
    protected $description;
    public function setName($name){
        $this->name = $name;
       }
    public function setCrm($desc){
        $this->description = $desc;
       }
    public function getName(){
        return $this->description;
       }
    public function getDescription(){
        return $this->description;
       }
}




?>