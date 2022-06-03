<?php
    class Usuario {


        private $idusuario;
        private $deslogin;
        private $dessenha;
        private $dtcadastro;


        //comeco id 
        public function getIdusario(){

            return $this->idusuario;
        }
        public function setIdusuario($value){

            $this->idusuario = $value;
        }
        //fim id

        //comeco login
        public function getDeslogin(){

            return $this->deslogin; 

        }

        public function setDeslogin($value){

            $this->deslogin = $value;
            
    
        }
        //fim login


        //comeco dessenha
        public function getDessenha(){

            return $this->dessenha; 

        }

        public function setDessenha($value){

            $this->dessenha = $value;
            
    
        }

        //fim dessenha

        //comeco cadastro
        public function getDtcadastro(){

            return $this->dtcadastro; 

        }

        public function setDtcadastro($value){

            $this->dtcadastro = $value;
            
    
        }

        //fim cadastro
    
     /////////////////////////////////////////////////////////////////   
    public function loadById($id){


        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuario WHERE  idusuario = :ID", array(
            ":ID"=>$id 


        ));

        if (isset($result[0])) {

            $row = $result[0];

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));

        }
    }

    public static function getList(){
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuario ORDER BY deslogin ");
    }

    public static function search($login){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuario WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=>"%". $login ."%"



        ));
    }

    public function login($login, $password){
        
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuario WHERE  deslogin = :LOGIN AND  dessenha =:PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password 


        ));

        if (isset($result[0])) {

            $row = $result[0];

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));

    } else {

        throw new Exception ("Login e/ou senha inválidos.");
    }

}

    public function __toString(){


        return json_encode(array(
            "idusuario"=>$this->getIdusario(),
            "deslogin"=>$this->getDeslogin(),
            "desssenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
    }
}