<?php
include 'includes/header.php'; 
include 'includes/travel-data.php';
asort($countries);

// we will display the filtered array
$filtered = array();

// first see if we should filter the countries
if (isset($_GET['country'])) {
    
    // loop thru each image in dataset and see if its country matches request
    foreach ($images as $img) {
        if ($img['country'] == $_GET['country']) {
            // we have a match so add that image to filtered array
            $filtered[$img['id']] = $img;
        }
    }
    //reassign the images array to the current subset
    $images = $filtered;
}
?>
    <!-- Page Content -->
    <main class="container">
        <div class="btn-group countryButtons" role="group" aria-label="...">
              <a role="button" class="btn btn-default" href="list.php">All</a>
           
              <?php 
	
	      foreach($countries as $country){                                            

		echo "<a href="list.php?country=$country" role="button" class="btn btn-default">$country</a>";

	      }

	      ?>
               
        </div>               
           
        

		<ul class="caption-style-2">
         
          	<?php

			foreach($images as $image){

				$id=$image->id;

				$path=$image->path;

				$title=$image->title;

				echo " <li>

				<a href="imgDetail.php?id=$id" class="img-responsive">

				<img src="images/square/$path" alt="$title">

				<div class='caption>

   					<div class='blur'></div>

   					<div class="caption-text">

      						<h1>$title</h1>

   					</div>

				</div></li>";
			}
	 	 ?>		
      
       		 </ul>       

      
    </main>
<?php include "includes/footer.php"; ?>
