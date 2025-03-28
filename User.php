<?php
class User
{
    public $full_name;
    public $user_name;
    public $phone;
    public $whatsapp_number;
    public $address;
    public $email;
    private $password;
    public $user_image;


    public function __construct($full_name, $user_name, $phone, $whatsapp_number, $address, $email, $password, $user_image)
    {
        $this->full_name = $full_name;
        $this->user_name = $user_name;
        $this->phone = $phone;
        $this->whatsapp_number = $whatsapp_number;
        $this->address = $address;
        $this->email = $email;
        $this->password = $password;
        $this->user_image = $user_image;
    }
    public function getPassword(){
        return $this->password;
    }
}


?>