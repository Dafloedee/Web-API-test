


<!-- DAVIN KURNIA HIUREDHY - 672017018 -->

<!doctype html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    	</script> 
		<link rel="stylesheet" href="customstyles.css">
		<script> 
        $(document).ready(function() { 
          
                $("html, body").animate({ 
                    scrollTop: $( 
                      'html, body').get(0).scrollHeight 
                }, 2000); 
           
        }); 
   	 	</script> 

		<title>Api External</title>
		<style>
		body, html {
  		height: 100%;
  		margin: 0;
		}
		.bg {
  			background-color : #393e3d;
  			height: 100%;
  			background-position: center;
  			background-repeat: no-repeat;
  			background-size: cover;
			}

		.navbar-dark .navbar-brand {
    		color : #ff2a35;
			}	
		</style>
	</head>



<?php
session_start();

echo'
	<body>
		<div class="bg">
			<nav class="navbar navbar-dark navbar-expand-lg bg-transparent">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
   		 			<a class="navbar-brand" href="#">Cocktail DB</a>
   		 		</ul>
  				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
  				    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    			    <span class="navbar-toggler-icon"></span>
  				</button>
			</nav>	
            <form method="post">
				<div class="col-sm-10 col-sm offset-1 ">
					<h1 class="display-3 text-light text-left"><br>Welcome to Cocktail DB</h1>
					<h1 class="lead text-light text-left"> &ensp; Search name about cocktail here : </h1>
 					<div class="container-fluid" >
 						<div class="input-group md-form form-sm form-2 pl-0 " >
  							<input class="form-control my-0 py-1 red-border" type="text" id = "subject" name = "subject" placeholder="Search name of cocktail" aria-label="Search name of cocktail" >
							&ensp; <input class="btn btn-success" type="submit" id="search" name="Search" value="Search"> 
						</div>	
					<h6 class="lead text-light text-left"> Try search Blue Margarita, Martini or many more </h6>	
 		 			</div>
 		 		</div>
 		 	</form>
		</div>
	</body>
';

if(isset($_POST['subject'])){
	$var1 = str_replace(' ', '%20',$_POST['subject']);

	$curl = curl_init();

	curl_setopt_array($curl, array(
  	CURLOPT_URL => "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=$var1",
  	CURLOPT_RETURNTRANSFER => true,
  	CURLOPT_ENCODING => "",
  	CURLOPT_MAXREDIRS => 10,
  	CURLOPT_TIMEOUT => 30,
  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  	CURLOPT_CUSTOMREQUEST => "GET",
  	CURLOPT_HTTPHEADER => array( "key: 1"),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
  	echo "cURL Error #:" . $err;
	} else {

  	$Array = json_decode($response,true);
  	$CocktailName = $Array["drinks"][0]["strDrink"];
  	$ImageUrl = $Array["drinks"][0]["strDrinkThumb"];

  	echo '
  	<body>
		<div class="container-fluid">
		<br>
		<br>
			<h3>Search Result</h3>
			<div class="col-sm-12 my-auto">
			<div class="card mb-3" style="max-width: 1080px;"">
  				<div class="row no-gutters">
    				<div class="col-md-4" >
    				<br>
    				<br>
    				<br>
      					<img src='.$ImageUrl.' class="card-img">
    				</div>
   				    <div class="col-md-8">
      					<div class="card-body">
        					<h5 class="card-title">'.$CocktailName.'</h5>
        					<p class="card-text">
        						Id : '.$Array["drinks"][0]["idDrink"].' <br>
			               		Cocktail Name : '.$Array["drinks"][0]["strDrink"].'<br>
			 					Category : '.$Array["drinks"][0]["strCategory"].'<br>
								Achololic : '.$Array["drinks"][0]["strAlcoholic"].'<br>
								Glass Ussage : '.$Array["drinks"][0]["strGlass"].'<br>
			 					Instruction : '.$Array["drinks"][0]["strInstructions"].'<br>
			 					Ingredients : <br>
			  					- '.$Array["drinks"][0]["strIngredient1"].'<br>
			  					- '.$Array["drinks"][0]["strIngredient2"].'<br>
								- '.$Array["drinks"][0]["strIngredient3"].'<br>
			 					- '.$Array["drinks"][0]["strIngredient4"].'<br>
			 					Measure : <br>
			 					- '.$Array["drinks"][0]["strMeasure1"].'<br>
								- '.$Array["drinks"][0]["strMeasure2"].'<br>
			 				    - '.$Array["drinks"][0]["strMeasure3"].'<br>
        					</p>
       						 <p class="card-text">
       						 	<small class="text-muted">
       						 		Last Modified : '.$Array["drinks"][0]["dateModified"].'
       						 	</small>
       						 </p>
      					</div>
   					 </div>
  				</div>
			</div>
			</div>
		';
/*
		for ($i = 0; $i < count($Array); $i++) {
			echo 'Id : '.$Array["drinks"][0]["idDrink"]."<br>";
			echo 'Cocktail Name : '.$Array["drinks"][0]["strDrink"]."<br>";
			echo 'Category : '.$Array["drinks"][0]["strCategory"]."<br>";
			echo 'Achololic : '.$Array["drinks"][0]["strAlcoholic"]."<br>";
			echo 'Glass Ussage : '.$Array["drinks"][0]["strGlass"]."<br>";

			echo 'Instruction : '.$Array["drinks"][0]["strInstructions"]."<br>";
			echo 'Ingredients : '."<br>";
			echo ' - '.$Array["drinks"][0]["strIngredient1"]."<br>";
			echo ' - '.$Array["drinks"][0]["strIngredient2"]."<br>";
			echo ' - '.$Array["drinks"][0]["strIngredient3"]."<br>";
			echo ' - '.$Array["drinks"][0]["strIngredient4"]."<br>";
			echo 'Measure : '."<br>";
			echo ' - '.$Array["drinks"][0]["strMeasure1"]."<br>";
			echo ' - '.$Array["drinks"][0]["strMeasure2"]."<br>";
			echo ' - '.$Array["drinks"][0]["strMeasure3"]."<br>";
			echo 'Last Modified : '.$Array["drinks"][0]["dateModified"]."<br>";
		}*/	
		echo'
		<br>
		<br>
		<br>
		</div>
	</body>';
  
	}
}
?>