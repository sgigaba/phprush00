
<<!DOCTYPE html>
<html>
<head>
    <title>Add product</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>

<div>
<form method = "post">
<?php
    echo $error;
?>
<input type = "text" name = "name" value = "<?php echo $name;?>">
<br>
<input type = "text" name = "price" value = "<?php echo $price;?>">
<br>
<input type = "submit" name = "submit">
</form>
</div>
</body>
</html>

<?php
//$index = 1;
$error = '';
$name = '';
$price = '';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}
if (isset($_POST["submit"]))
{
    if (empty($_POST["name"]))
    {
        $error .= '<p><label class = "text-danger">Please submit product name';
    }
    else
    {
        $name = clean_text($_POST["name"]);
    }
    if (empty($_POST["price"]))
    {
        $error .= '<p><label class = "text-danger">Please enter price';
    }
    else
    {
        $price = clean_text($_POST["price"]);
    }
    if (!$error)
    {
        $file_open = fopen("productlist.csv", "a");
        $no_rows = count(file("productlist.csv"));
        if ($no_rows > 1)
        {
            $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array("sr_no" => $no_rows, "name" => $name, "price" => $price);
        fputcsv($file_open, $form_data);
        $error .='<p><label class = "text-danger">Successful';
        $name = '';
        $price = '';
    }

}

?>