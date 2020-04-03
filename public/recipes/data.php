<?php 
    $json = file_get_contents("http://www.recipepuppy.com/api/?q=rice");
    $data = json_decode($json);
    $data->results[0]->title; // The title of the recipe
    $data->results[0]->href; // A link to the main recipe
    $data->results[0]->ingredients; // A comma separated list of the ingredients
    $data->results[0]->thumbnail; // The url of a thumbnail image or an empty string



    foreach($data->results as $recipe) {
        echo "<div class='recipe'>";
        echo "<h3>".$recipe->title."</h3>";
        echo "<p>".$recipe->ingredients."</p>"; 
        echo "<img src='".$recipe->thumbnail."'>"; 
        echo "<br></br>";
        echo "<a href='".$recipe->href."'>View Full Recipe</a>"; 
        echo "</div>";
      }
?>