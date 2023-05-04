<?php

 class Person{
   protected $name; 
   protected $cpf;
   protected $gen;
   protected $date;
   protected $adr;
   public function setName($name){
    $this->name = $name;
   }
   public function setCpf($cpf){
    $this->cpf = $cpf;
   }
   public function setGen($gen){
    $this->gen = $gen;
   }
   public function setDate($date){
    $this->date = $date;
   }
   public function setAdr($adr){
    $this->adr = $adr;
   }

   public function getName(){
    return  $this->name;
}
   public function getCpf(){
    return  $this->cpf;
   }
   public function getGen(){
    return  $this->gen;
   }
   public function getDate(){
    return  $this->date;
   }
   public function getAdr(){
    return  $this->adr;
   }
}








?>