<?php

class App{
    public $host=HOST;
    public $dbname=DBNAME;
    public $user=USER;
    public $pass=PASS;

    public $link;

    //create constructor 
    public function __construct(){
        $this->connect();
    }

    public function connect() {
        $this->link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."", $this->user, $this->pass);

        // if($this->link) {
        //     echo "db connection is working";
        // }
    }
    //select all
    public function selectAll($query){
        $rows=$this->link->query($query);
        $rows->execute();
        $allRows=$rows->fetchAll(PDO::FETCH_OBJ);
        if($allRows){
            return $allRows;
        }else{
            return 0;
        }
    }

    public function validatacart($q){
        $rows=$this->link->query($q);
        $rows->execute();
        $count=$rows->rowCount();
        return $count;

    }

        //select one
    public function selectone($query){
        $row =$this->link->query($query);
        $row ->execute();

        $singelrow=$row->fetch(PDO::FETCH_OBJ);
        if($singelrow){
            return $singelrow;
        }else{
            return false;
        }
    }

    //insert
    public function insert($query,$arr,$path){
        if($this->validate($arr)=="empty"){
           echo  "<script>alert('one or more inputs are impty ')</script>";
        }else{
            $insert_record=$this->link->prepare($query);
            $insert_record->execute($arr);

            echo "<script>window.location.href='".$path."'</script>";
        }
    }
    //update
    public function update($query,$arr,$path){
        if($this->validate($arr)=="empty"){
           echo  "<script>alert('one or more inputs are impty ')</script>";
        }else{
            $update_record=$this->link->prepare($query);
            $update_record->execute($arr);

            header("location:".$path."");
        }
    }
    //delete
    public function delete($query,$path){
            $delete_record=$this->link->prepare($query);
            $delete_record->execute();

            echo "<script>window.location.href='".$path."'</script>";
        }
    

    public function validate($arr){
        if(in_array("",$arr)){
            echo "empty";
        }
    }

    //regisster 
    public function register($query,$arr,$path){
        if($this->validate($arr)=="empty"){
           echo  "<script>alert('one or more inputs are impty ')</script>";
        }else{
            $register_user=$this->link->prepare($query);
            $register_user->execute($arr);

            header("location:".$path."");
        }
    }

    //login 
    public function login($query,$data,$path){
        //email validate 
        $login_user=$this->link->query($query);
        $login_user->execute();

        $fetch=$login_user->fetch(PDO::FETCH_ASSOC);

        if($login_user->rowCount()>0){
            if(password_verify($data['password'],$fetch['Password'])){
                //start session 
                session_start();
                $_SESSION['user_id'] = $fetch['Id'];
                $_SESSION['email'] = $fetch['Email'];
                $_SESSION['username'] = $fetch['Username'];

                header("location:".$path."");
            }
        }

    }

//start session
    public function startsession(){
        session_start();
    }

//validate session 
    public function validatesession($path){
        if(isset($_SESSION['user_id'])){
            echo "<script>window.location.href='".APPURL."'</script>";
        }
    }

    public function validatesessionAdmin($path){
        if(isset($_SESSION['email'])){
            echo "<script>window.location.href='".$path."'</script>";
        }
    }

    public function validatesessionAdminInside(){
        if(!isset($_SESSION['email'])){
            echo "<script>window.location.href='".ADMINURL."/admins/login-admins.php'</script>";
        }
    }

}

