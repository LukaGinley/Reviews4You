<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage($pimgdir,$pcurrpage,$psortmode,$psortorder)
{
    include("ranking-reviews.php");
    $treviewtable = createReviewListElement($pcurrpage,$psortmode,$psortorder);
    
        
$tcontent = <<<PAGE
		<div >
			<div class="panel panel-danger">
			<div class="panel-body">
                <div class="card text-center">
				<h2 style="margin:20px">Ranking List</h2>
				<div id="review-table">
			    {$treviewtable}
		        </div>
		    </div>
			</div>
		</div>
PAGE;

return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();
$tcurrpage = $_REQUEST["page"] ?? 1;
$tcurrpage = is_numeric($tcurrpage) ? $tcurrpage: 1;
$tsortmode = $_REQUEST["sortmode"] ?? "squadno";
$tsortorder = $_REQUEST["sortorder"] ?? "asc";

$tpagetitle = "Ranking List";
$tpage = new MasterPage($tpagetitle);
$timgdir = $tpage->getPage()->getDirImages();

//Build up our Dynamic Content Items. 
$tpagelead  = "";
$tpagecontent = createPage($timgdir,$tcurrpage,$tsortmode,$tsortorder);
$tpagefooter = "";

//----BUILD OUR HTML PAGE----------------------------
//Set the Three Dynamic Areas (1 and 3 have defaults)
if(!empty($tpagelead))
    $tpage->setDynamic1($tpagelead);
$tpage->setDynamic2($tpagecontent);
if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);
//Return the Dynamic Page to the user. 
$tpage->addScriptFile("ajax-review.js");
$tpage->renderPage();
?>