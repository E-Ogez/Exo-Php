<?php 
class user{
    private $id;
    private $login;
    private $pass;

    public function __construct($id,$login,$pass){
        $this->id = $id;
        $this->login = $login;
        $this->pass = $pass;
    }
    public function getnom(){
        return $this->login;
    }
    public function getUser($NOM,$MDP){
        
        if($NOM==$this->login && $MDP==$this->pass){
            return true;
        }else{
            return false;
        }

    }
}
?>
