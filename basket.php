
<HTML>

<head>
    
<title>  Basket </title> 
<link rel="stylesheet" type="text/css" href = "styles/styles.css"/>

<center><h1> Items in your basket </h1></center>
</head>

<div class = "this">
<body>
<div class = "basket">
<?php
$remove;
$v = 3;
$f = fopen("basket.csv", "r");
while (($line = fgetcsv($f)) !== false)
{
    echo "<br>";
    foreach ($line as $data)
    {
        $v--;
        echo "<div class = \basket\ \>".htmlspecialchars($data);
        if ($v == 1)
        {
           echo "<form method = \ get \>";
            echo "<button type = \submit\ name = \ remove item \ value = \ remove item \> Remove item </button>";
            $v = 2;
        }
       
    }
    echo "<br>\n";
}
fclose($f);
?>
</form>
</body>
</HTML>