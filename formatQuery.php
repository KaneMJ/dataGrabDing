<?php 

//print_r($response);
//This will get the count. Use it for your loop. echo count($response->body->results);
//echo $response->raw_body;

$count = count($response->body->results);


//Hard Coded Values: 
$dairy = 1;
$egg = 1;
$gluten = 1;
$peanut = 1;
$seafood = 1;
$sesame = 1;
$shellfish = 1;
$soy = 1;
$tree_nut = 1;
$wheat = 1;

//Hard Code some database test data;



$conn = mysqli_connect('localhost','root','root','ding');

if(empty($conn)){
    die("Server is dead");
}

for($counter = 0; $counter < $count; $counter++){
$recipe_id = $response->body->results[$counter]->id;
$title = $response->body->results[$counter]->title;
$query = "INSERT INTO `recipe_database` (`recipe_id`, `title`, `dairy` , `egg`, `gluten`, `peanut`, `seafood`, `sesame`, `shellfish`, `soy`, `tree_nut`, `wheat`) 
            VALUES ('$recipe_id', '$title', '$dairy' ,'$egg', '$gluten', '$peanut', '$seafood', '$sesame', '$shellfish', '$soy', '$tree_nut', '$wheat')";
$result = mysqli_query($conn, $query);
}

echo "The result is $result";
?>