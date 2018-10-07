<html>
<head>
    
    <title>Sneakers</title>
    <link rel="stylesheet" type="text/css" href = "styles/styles.css"/>
    <div class = "this">

    <div class = "signupl">
    <button type = "button">SIGN IN</button>
    <button type = "button">SIGN UP</button>
    </div>
    <div>
    <img id = "imgc" src = "https://cdn4.iconfinder.com/data/icons/shopping-in-color/64/shopping-in-color-05-512.png">
    </div>
</div>
</head>
<body>
<div class = "maindiv"> 
<div class = "content">   
    <div>
       <center><img class = "infoimg" src = "https://assets.superbalistcdn.co.za/500x720/filters:quality(75):format(jpg)/624378/original.jpg"/></center>
       <div class = "productinfo">
            <div class = "addcart">
            <form method = "post">
            <input type = "submit", name = "submit">
            </form>
            </div>
        </div>
        <br>

    </div>
</div>
<div class = "footer">
<footer>
   <a href = "sneakers.php"><center><h1>Back to Sneakers</h1></center></a>
</footer>
</div>
</div>
</body>
</html>

<?php
$itemnumber = 2;
$name = '';
$price = '';
$quantity = '';

function finditem($itemnumber)
{
    $productfile = file("productlist.csv");
    foreach($productfile as $x)
    {
        $products[] = explode(',', $x);
    }
    $i = 0;
    $v = 0;
    while ($i < count($products))
    {
        $v = 0;
        while ($products[$i][$v])
        {
            if ($products[$i][$v] == $itemnumber)
            {
                 return ($products[$i]);    
            }
            $v++;
         }
        $i++;
    }
}
$basket = finditem($itemnumber);
$name = trim($basket[1]);
$price = trim($basket[2]);

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}
if (isset($_POST['submit']))
{
    $file_open = fopen("basket.csv", "a");
    $no_rows = count(file("basket.csv"));
    if ($no_rows > 1)
    {
        $no_rows = ($no_rows - 1) + 1;
    }
    $form_data = array("sr_no" => $no_rows, "name" => $name, "price" => $price);
    fputcsv($file_open, $form_data);
    $item = '';
}
?>