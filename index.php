<?php
include 'DB_Ops.php';

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
    public $image_path;


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
}


class UserDataHandler
{

}






function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$fullName =
    $userName =
    $phone =
    $whatsappNumber =
    $address =
    $email =
    $password =
    $confirmPassword =
    $user_image = "";

$fullNameError = $userNameError = $phoneError = $whatsappNumberError = $addressError = $emailError = $passwordError
    = $confirmPasswordError = $userImageError = "";
function validate_fullForm()
{
    global
    $fullName,
    $userName,
    $phone,
    $whatsappNumber,
    $address,
    $email,
    $password,
    $confirmPassword,
    $user_image,
    $fullNameError, $userNameError, $phoneError, $whatsappNumberError, $addressError, $emailError,
    $passwordError, $confirmPasswordError, $userImageError;





    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (empty($_POST['full_name'])) {
            $fullNameError = "Full Name is required";
        } else {
            $fullName = clean_input($_POST['full_name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $fullName)) {
                $fullNameError = "Only letters and white space allowed";
            }
        }

        //need to add ajax


        if (empty($_POST['user_name']))
            $userNameError = "User Name is required";
        else
            $userName = clean_input($_POST['user_name']);





        if (empty($_POST['phone'])) {
            $phoneError = "Phone number is required";
        } else {
            $phone = clean_input($_POST['phone']);
            if (!preg_match('/^\d{11}$/', $phone)) {
                $phoneError = "Phone number must be exactly 11 digits and contain only numbers.";
            }
        }

        if (empty($_POST['whatsapp_number'])) {
            $whatsappNumberError = "WhatsApp number is required";
        } else {
            $whatsappNumber = clean_input($_POST['whatsapp_number']);
            if (!preg_match('/^\d{11}$/', $whatsappNumber)) {
                $whatsappNumberError = "whatsappNumber number must be exactly 11 digits and contain only numbers.";
            }
            /**
             * need to add the whatsapp number validator==> server
             */
        }

        if (empty($_POST['address'])) {
            $addressError = "Address is required";
        } else {
            $address = clean_input($_POST['address']);
        }

        if (empty($_POST['email']))
            $emailError = "Email is required";
        else {
            $email = clean_input($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format";
            }
        }


        if (empty($_POST['password']))
            $passwordError = "Password is required";
        else {
            $password = $_POST['password'];
            if (!preg_match('/^(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
                $passwordError = "Password must be at least 8 characters long, include at least 1 number, and 1 special character.";
            }
        }



        if (empty($_POST['confirm_password']))
            $confirmPasswordError = "Confirm Password is required";
        else {
            $confirmPassword = clean_input($_POST['confirm_password']);
            if ($password != $confirmPassword) {
                $confirmPasswordError = "passwords do not match";
            }


            if (empty($_FILES['user_image']['name']))
                $userImageError = "User image is required";
            else
                $user_image = $_FILES['user_image'];
        }
    }

    // if (empty($fullNameError) && empty($userNameError) && empty($phoneError) && empty($whatsappNumberError) && empty($addressError) &&
    // empty($emailError) && empty($passwordError) && empty($confirmPasswordError) && empty($userImageError)) {
    //     header("Location: success.php"); 
    //     exit();
    // }
}


validate_fullForm();




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form action="index.php" method="post" id="form1" enctype="multipart/form-data">
        <label for="full_name">Full Name</label>
        <input type="text" name="full_name" id="full_name" value="<?php echo htmlspecialchars($fullName) ?>">

        <span class="error">* <?php echo $fullNameError; ?></span>




        <br>
        <br>
        <label for="user_name">User Name</label>
        <input type="text" name="user_name" id="user_name" value="<?php echo htmlspecialchars($userName) ?>">
        <span class="error">* <?php echo $userNameError; ?></span>


        <br><br>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" placeholder="01********" value="<?php echo htmlspecialchars($phone) ?>">
        <span class="error">* <?php echo $phoneError; ?></span>

        <br><br>
        <label for="whatsapp_number">Whatsapp Number</label>
        <input type="text" name="whatsapp_number" id="whatsapp_number" placeholder="01********" value="<?php echo htmlspecialchars($whatsappNumber) ?>">
        <span class="error">* <?php echo $whatsappNumberError; ?></span>


        <br><br>
        <label for="address">Address</label>
        <textarea name="address" rows="5" cols="40">

        <?php echo htmlspecialchars($address) ?>
        </textarea>
        <span class="error">* <?php echo $addressError; ?></span>

        <br><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email) ?>">
        <span class="error">* <?php echo $emailError; ?></span>

        <br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <span class="error">* <?php echo $passwordError; ?></span>

        <br><br>
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <span class="error">* <?php echo $confirmPasswordError; ?></span>
        <br><br>

        <label for="user_image">User Image</label>
        <input type="file" name="user_image" id="user_image">
        <span class="error">* <?php echo $userImageError; ?></span>
        <br><br>


        <input type="submit" value="Register">


    </form>
</body>

</html>