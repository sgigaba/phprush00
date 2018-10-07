<?php
$error = '';
$Name = '';
$Email = '';

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
    if (empty($_POST["Email"]))
    {
        $error .='<p><label class = "text-danger">Please Submit Email';
    }
    else
    {
         $Email = clean_text($_POST["Email"]);
    }
    if (!$error)
    {
        $file_open = fopen("login.csv", "a");
        $no_rows = count(file("login.csv"));
        if ($no_rows > 1)
        {
            $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array("sr_no" => $no_rows, "Name" => $Name,"email" => $Email);
        fputcsv($file_open, $form_data);
        $error .='<p><label class = "text-danger">Login Successful';
        $name = '';
        $email = '';
    }
}
?>

<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
   <center> <form method  = "post">
       <?php
            echo $error;
       ?>
       <div class = "fstuff">
        <input type = "text" name = "Name" placeholder = "enter name" value = "<?php echo $Name;?>">
        <br>
        <br>
        <input type = "text" name = "Email" placeholder = "enter email" value = "<?php echo $Email;?>">
        <br>
        <br>
        <input type = "submit" name = "submit" class = "submitbut">
        </div>
    </form> </center>
</head>
<body>
    
</body>
</html>