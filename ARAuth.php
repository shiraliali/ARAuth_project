<?php
//   ARAuth Sample project for retrive validation of customers
//   Created By @Alyshirali 
  
//   @param1 = url
//   @param2 = email
//   @param3 = key
//   @param4 = domain


class Arauth {

    public $auth = "https://androidriver.net/auth/";
    public $email;
    public $key;
    public $domain;

    
    public function __construct($email, $key, $domain) {
      
            $this->email = $email;
            $this->key = $key;
            $this->domain = $domain;
            
    }


    public function setEmail($email){
        $this->email = $email;
    }


    public function setKey($key){
        $this->key = $key;
    }


    public function setDomain($domain){
        $this->domain = $domain;
    }

}


$msg[0] = "دامنه مطابقت ندارد.";
$msg[1] = "ایمیل مطابقت ندارند";
$msg[2] = "کد لایسنس مطابقت ندارد";
$msg[3] = "کد لایسنس مسدود/منقضی شده است";

?>