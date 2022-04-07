<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="style.css">
   <style>

         h2,h3{
         	text-align: center;
         }
         body{
         	background-color: #e2e9e9;
         }
         a{
         	text-decoration: none;
         	background-color: #266e58;
            color: #e2e9e9;
            padding: 4px 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width:100%;
            text-align: center;
         }
   </style>
</head>
<body>

<?php
error_reporting(0);

$servername = "localhost";
$username = "MUtiu";
$password = "13112001Marti";
$dbname = "MUtiu";

$conn = new mysqli($servername, $username, $password, $dbname);

$nume=$_POST['nume'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$data=$_POST['data'];
$time=$_POST['time'];
$data=$_POST['data'];
$ora=$_POST['ora'];
$tipanimal=$_POST['tipanimal'];
$data=$_POST['data'];
$mesaj=$_POST['mesaj'];

if ($conn->connect_error)

{

die("Connection failed: " . $conn->connect_error);

}

$sql="INSERT INTO `PROGRAMARI` (`ID`, `Nume`, `Email`, `Data`, `Ora`, `Animal`, `Telefon`, `Mesaj`) VALUES ('', '$nume', '$email', '$data', '$time', '$tipanimal', '$tel', 'mesaj')";

$result = $conn->query($sql);

if ($result == TRUE)

{

echo "<br><br><br><br><div id='em' class='blink_me'>".$subiect." 
<h2>Programare a fost realizata!</h2>
<h3><a href='index.html'>Intoarceti-va Acasa</a></h3>
   "."</div>";


}

else

{

echo $conn->error;

}



if(isset($_POST['submit'])) { // Checking null values in message.
    if (empty($_POST["name"])){
        echo "<p class='error'>Numele este necesar</p>";
        exit();
}
    else
 {
    $name = test_input($_POST["name"]); // check name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name))
    {
        echo "<p class='error'>Doar literele si spatiile se accepta</p>";
    }
  } // Checking null values inthe message.
     if (empty($_POST["email"]))
    {
         echo "<p class='error'>Emailul este necesar</p>";
         exit();
    }
         else
         {
            $email = test_input($_POST["email"]);
         } 
      if(empty($_POST['tipanimal']))
            echo "<p class='error>Trebuie sa selectati un animal pentru programare</p>";

      if( !($name=='') && !($email=='') )
      { // Checking valid email.
             if (preg_match("/([w-]+@[w-]+.[w-]+)/",$email))
             {
                    $header= $name."<". $email .">";
                    $headers = "FormGet.com"; /* Let's prepare the message for the e-mail */
                    $msg = "Buna ziua! $name Va multumin, programarea dumneavoastra a fost inregistrata!
                        Nume: $name
                        Email: $email
                        Data si ora: $date , $time
                        Message: $message
                        Acesta este un email de confirmare;";
                    $msg1 = " $name ne-a contactat. Aici sunt cateva informatii depsre programarea $name.
                         Nume: $name
                         Email: $email
                         Data:
                         Message: $message "; /* Send the message using mail() function */
                    if(mail($email, $headers, $msg ) && mail("receiver_mail_id@xyz.com", $header, $msg1 ))
                    {
                            echo "<p class='success'>Programare trimisa cu succes</p>";
                    }
              }
            else
            {  echo "<p class='error'>Email invalid</p>";
             }
      }
} // Function for filtering input values.function test_input($data)
{
$data = trim($data);
$data =stripslashes($data);
$data =htmlspecialchars($data);
return $data;
}


$conn->close();

?>


</body>
</html>