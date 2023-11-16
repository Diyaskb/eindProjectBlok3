<?php

// print all VARS
// var_dump(get_defined_vars());


require "database.php";

$zoekwoord = "";


if(isset($_POST["zoek"])){
  if(isset($_POST['zoeken'])){
    $zoekwoord = $_POST['zoeken'];
    $sql = "SELECT `name` , `selling_price` FROM `products` WHERE `name` LIKE '%$zoekwoord%'";
  }
}



$result = $mysqli->query("SELECT * FROM products");
$producten = $result->fetch_all(MYSQLI_ASSOC); // resultaten staan in $producten. Dit is een array

// VOORGERECHTEN EN SOEPEN
$catVoorSoep = $mysqli->query("SELECT * FROM products WHERE category = 'soepen/voorgerechten'  AND `name` LIKE '%$zoekwoord%'");
$voorSoepen = $catVoorSoep->fetch_all(MYSQLI_ASSOC);

// PIZZA
$catPizza = $mysqli->query("SELECT * FROM products WHERE category = 'pizza' AND `name` LIKE '%$zoekwoord%'");
$pizzas = $catPizza->fetch_all(MYSQLI_ASSOC);

//PASTA
$catPasta = $mysqli->query("SELECT * FROM products WHERE category = 'pasta' AND `name` LIKE '%$zoekwoord%'");
$pastas = $catPasta->fetch_all(MYSQLI_ASSOC);

// KINDERMENU'S
$catKinderMenu= $mysqli->query("SELECT * FROM products WHERE category = 'kindermenu' AND `name` LIKE '%$zoekwoord%'");
$kidMenu = $catKinderMenu->fetch_all(MYSQLI_ASSOC);

// DESSERT
$catDessert= $mysqli->query("SELECT * FROM products WHERE category = 'dessert' AND `name` LIKE '%$zoekwoord%'");
$desserts = $catDessert->fetch_all(MYSQLI_ASSOC);

// COFFEE SPECIAL
$catCoffee= $mysqli->query("SELECT * FROM products WHERE category = 'coffee special' AND `name` LIKE '%$zoekwoord%'");
$coffeeSp = $catCoffee->fetch_all(MYSQLI_ASSOC);

// FOR EACH VOORGERECHT EN SOEPEN
$allVoorSoepen = '';
foreach($voorSoepen as $voorSoep){
    
   
    $allVoorSoepen = $allVoorSoepen . '<div class="row">
    <div class="col p-3 bg-dark text-white">'. $voorSoep["name"] . '</div>
    <div class="col p-3 bg-dark text-white">' . $voorSoep["selling_price"] . '</div>
  </div>';
}

// FOR EACH PIZZA
$allPizzas = '';
foreach($pizzas as $pizza){
    
   
    $allPizzas = $allPizzas . '<div class="row">
    <div class="col p-3 bg-dark text-white">'. $pizza["name"] . '</div>
    <div class="col p-3 bg-dark text-white">' . $pizza["selling_price"] . '</div>
  </div>';
}

// FOR EACH PASTA
$allPastas = '';
foreach($pastas as $pasta){
    
   
    $allPastas = $allPastas . '<div class="row">
    <div class="col p-3 bg-dark text-white">'. $pasta["name"] . '</div>
    <div class="col p-3 bg-dark text-white">' . $pasta["selling_price"] . '</div>
  </div>';
}

// FOR EACH KINDERMENU'S
$allKindermenus = '';
foreach($kidMenu as $Kindermenu){
    
   
    $allKindermenus = $allKindermenus . '<div class="row">
    <div class="col p-3 bg-dark text-white">'. $Kindermenu["name"] . '</div>
    <div class="col p-3 bg-dark text-white">' . $Kindermenu["selling_price"] . '</div>
  </div>';
}

// FOR EACH DESSERT
$allDesserts = '';
foreach($desserts as $dessert){
    
   
    $allDesserts = $allDesserts . '<div class="row">
    <div class="col p-3 bg-dark text-white">'. $dessert["name"] . '</div>
    <div class="col p-3 bg-dark text-white">' . $dessert["selling_price"] . '</div>
  </div>';
}

// FOR EACH COFFEE SPECIAL
$allCoffees = '';
foreach($coffeeSp as $coffee){
    
   
    $allCoffees = $allCoffees . '<div class="row">
    <div class="col p-3 bg-dark text-white">'. $coffee["name"] . '</div>
    <div class="col p-3 bg-dark text-white">' . $coffee["selling_price"] . '</div>
  </div>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<style>

.divTableBorder {
  font-family: Georgia, serif;
	border: 3px solid #fff;
	display: table-cell;
  background-color: rgb(233, 233, 233);
  text-align: center;

}
.hero-image {
  font-family: Georgia, serif;
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/headerPicture.jpg");
  height: 200px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* footer */
.footer {
    grid-area: auto;
    margin-top: auto;
    padding: 30px;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #0F1626;
    color: white;
    text-align: center;
}

.footerLink{
    padding: 0px 0px;


}

.footerLink img{
    display: inline;
    width: 30px;
    height: 30px;
} 

</style>
</head>
<body>
<div class="container-fluid p-0 bg-primary text-white text-center">

  <div class="hero-image">
       
          <h1 style="font-size: 60px; text-align: center;  font-family: Georgia, serif; ">AL VESUVIO </h1>
          <p>sinds 2022</p>
            <div class="container mt-3">    
                <a href="home.php" class="btn btn-light">Home</a> 
                <a href="menuTest.php" class="btn btn-light">Menu</a>
                <a href="bestellen.php" class="btn btn-light" name="zoek" value="zoek">Bestellen</a>
            </div>  
      
    </div>
</div>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="name">Search</label>
  <input type="text" name="zoeken" id="zoeken" >
  <button type="sumbit" name="zoek" id="zoek">Zoek</button>
</form>


<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4 divTableBorder">
      <h3>Voorgerechten en Soepen</h3>
      <?php echo $allVoorSoepen; ?>
    </div>

    <div class="col-sm-4 divTableBorder">
     <h3>Pizza's</h3>
     <?php echo $allPizzas; ?>
    </div>


    <div class="col-sm-4 divTableBorder">
      <h3>Pasta's</h3>        
      <?php echo $allPastas; ?>
    </div>

    <div class="col-sm-4 divTableBorder">
      <h3>Kindermenu</h3>        
      <?php echo $allKindermenus; ?>
    </div> 
    
    <div class="col-sm-4 divTableBorder">
      <h3>Desserts</h3>        
      <?php echo $allDesserts; ?>
    </div> 
    
    <div class="col-sm-4 divTableBorder">
      <h3>Coffee Specials</h3>        
      <?php echo $allCoffees; ?>
    </div>

  </div>
</div>


<div class="footer">
    <ul>
        <ul class="footerLink"><a href="https://nl-nl.facebook.com/"><img src="images/facebookBlack.jpg"></a><a href="https://www.instagram.com/"><img src="images/instagramBlack.png"></a><a href="https://twitter.com/i/flow/login"><img src="images/twitterBlack.png"></a></li>
    </ul>
</div>

</body>
</html>