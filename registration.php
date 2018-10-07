<html>
<head>
    <title>Page Title</title>

     <link rel="stylesheet" type="text/css" href="styles.css" />
     <body>
   <center> <form method  = "post">
       <?php
            echo $error;
       ?>
       <div class = "fstuff">
        <input type = "text" name = "Name" placeholder = "enter name" value = "<?php echo $Name;?>">
        <br>
        <br>
        <input type = "text" name = "Email" placeholder = "enter email">
        <br>
        <br>
        <input type = "text" name = "Surname" placeholder = "enter surname" value = "<?php echo $Surname;?>">
        <br>
        <br>
        <input type = "text" name = "number" placeholder = "enter cellphone number">
        <br>
        <input type = "submit" name = "submit" class = "submitbut">
        </div>
    </form> </center>
</body>
</head>
</html>


<?php
$error;
$email;
$Name;
$Surname;
$Cellnumber;

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if (isset($_POST["submit"]))
{
    if (empty($_POST["Name"]))
    {
        $error .='<p><label class = "text-danger">Please Submit Name';
    }
    else
    {
        $Name = clean_text($_POST["Name"]);
        if (!preg_match("/^[a-zA-z]*$/", $Name))
        {
            $error .='<p><label class = "text-danger">Please Submit valid Name';
        }
    }
    if (empty($_POST["Surname"]))
    {
        $error .='<p><label class = "text-danger">Please Submit Surname';
    }
    else
    {
        $Surname = clean_text($_POST["Surname"]);
    }
    if (!$error)
    {
        $file_open = fopen("reg.csv", "a");
        $no_rows = count(file("reg.csv"));
        if ($no_rows > 1)
        {
            $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array("sr_no" => $no_rows, "Name" => $Name,"Surname" => $Surname);
        fputcsv($file_open, $form_data);
        $error .='<p><label class = "text-danger">Login Successful';
        $name = '';
        $Dob = '';
        header("location: created.php");
       // header("location: index.php");
    }
}



?>