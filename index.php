<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
	$trailer01=file_get_contents("data/html/trailer01.html");
	$trailer02=file_get_contents("data/html/trailer02.html");
	$trailer03=file_get_contents("data/html/trailer03.html");
	$tcontent = <<<PAGE
<div class="container">
            <!-- Heading Row-->
            <div class="row align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="img/altimg/AnimalCrossing.jpg" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Animal Crossing: New Horizons</h1>
                    <p>Escape to a deserted island and create your own paradise as you explore, create, and customize in the Animal Crossing: New Horizons game. Your island getaway has a wealth of natural resources that can be used to craft everything from tools to creature comforts. You can hunt down insects at the crack of dawn, decorate your paradise throughout the day, or enjoy sunset on the beach while fishing in the ocean.</p>
                    <a class="btn btn-primary" href="review.php?id=6">Go to Review!</a>
                </div>
            </div>
            <!-- Call to Action-->
            <div class="card text-white bg-danger my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0">Reviews4You! is the most reliable Nintendo review site on the internet. Bringing great reviews straight to you!</p></div>
            </div>
            <!-- Content Row-->
            <div class="row">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">The Legend of Zelda: Breath of the Wild</h2>
                            <p class="card-text">Forget everything you know about The Legend of Zelda games. Step into a world of discovery, exploration, and adventure in The Legend of Zelda: Breath of the Wild, a boundary-breaking new game in the acclaimed series. Travel across vast fields, through forests, and to mountain peaks as you discover what has become of the kingdom of Hyrule in this stunning Open-Air Adventure.</p>
                             {$trailer01}
                        </div>                       
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="review.php?id=2">Go to Review!</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Super Mario 3D World + Bowser's Fury</h2>
                            <p class="card-text">The Super Mario 3D World + Bowser's Fury game features the same great co-op gameplay, creative levels and power-ups as the original game, but with added improvements. In the Super Mario 3D World part of the game, characters move faster and the dash powers up more quickly. Both adventures support the newly added Snapshot Mode-pause the action to get the perfect shot, apply filters, and decorate with stamps!</p>
                            {$trailer02}
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="review.php?id=1">Go to Review!</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Pokemon Sword & Shield</h2>
                            <p class="card-text">A new generation of Pokemon is coming to the Nintendo Switch system. Begin your adventure as a Pokemon Trainer by choosing one of three new partner Pokemon: Grookey, Scorbunny, or Sobble. Then embark on a journey in the new Galar region, where you'll challenge the troublemakers of Team Yell, while unraveling the mystery behind the Legendary Pokemon Zacian and Zamazenta! Explore the Wild Area, a vast expanse of land where the player can freely control the camera.</p>
                            {$trailer03}
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="review.php?id=7">Go to Review!</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-danger">
            <div class="container"><p class="m-0 text-center text-white">Luka Ginley (862544) &copy; Reviews4You! 2021</p></div>
        </footer>
PAGE;
return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Home Page";
$tpagelead  = "";
$tpagecontent = createPage();
$tpagefooter = "";

//----BUILD OUR HTML PAGE----------------------------
//Create an instance of our Page class
$tpage = new MasterPage($tpagetitle);
//Set the Three Dynamic Areas (1 and 3 have defaults)
if(!empty($tpagelead))
    $tpage->setDynamic1($tpagelead);
$tpage->setDynamic2($tpagecontent);
if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);
//Return the Dynamic Page to the user.    
$tpage->renderPage();
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           