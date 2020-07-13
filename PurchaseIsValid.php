<?php
require 'ARAuth.php';

echo '<div align="center"><form method="post">
<input type="text" name="email" value="" placeholder="ایمیل شما"><br>
<input type="text" name="key" value="" placeholder="کد لایسنس"><br>
<input type="text" name="domain" value="" placeholder="دامنه ثبت شده"><br>
<button type="submit" name="submit">دریافت نتیجه</button>
</form></div>';

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $key = $_POST['key'];
    $domain = $_POST['domain'];

    //Check if domain is true
    if($_SERVER['HTTP_HOST'] == $domain){

    $api = new Arauth($email, $key, $domain);  

    $api->setDomain($domain);
    $api->setKey($key);
    $api->setEmail($email);

    $res = $api->auth."validate?email=".$api->email."&key=".$api->key."&domain=".$api->domain;

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $res);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


    $result = curl_exec($curl);

    $response = json_decode($result);

    
    //Validation result can be true,false and Not Found
    $response->validation; //print validation result using => echo $response->validation;

    if($response->validation == 'true'){ // Customer is Valid

        //Do someting for grant access to your buyer
        echo $response->desc;
    }


    if($response->validation == 'false'){ // Customer data is incorrect

        echo $response->desc;

    }

    if($response->validation == 'Not Found'){ // Customer is Not Valid

        echo $response->desc;

    }
    
    //Close Request 
    curl_close($curl);

    }else{

       echo $msg[0];

       exit;
    }
}

?>