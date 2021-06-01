<?php
require_once ("oo_bll.inc.php");
require_once ("oo_pl.inc.php");

// ===========RENDER BUSINESS LOGIC OBJECTS=======================================================================

// ----------REVIEWTABLE RENDERING---------------------------------------
function renderReviewTable(BLLRevList $plist) {
	$trowdata = "";
	foreach ( $plist->gamelist as $tp )
	 $trowdata.=<<<ROW
<tr>
   <td>{$tp->rank}</td>
   <td>{$tp->gamename}</td>
   <td>{$tp->editorialscore}</td>
   <td>{$tp->audiencescore}</td>
   <td><a class="btn btn-primary" href="review.php?id={$tp->id}">Go to Review!>>></a></td>
</tr>
ROW;
	
	$ttable = <<<TABLE
<table class="table table-striped table-hover">
	<thead class="table-primary">
		<tr>
            <th>Rank</th>
			<th id="sort-name">Game</th>
			<th id="sort-ageno">Editorial Score</th>
			<th>Audience Score</th>
			<th> </th>
		</tr>
	</thead>
	<tbody>
	{$trowdata}
	</tbody>
</table>
TABLE;
	return $ttable;
}

function renderReviewOverview(BLLGame $pg) {
	$timgref = "img/covers/{$pg->id}.jpeg";
	$timg = $timgref;
	$tfullreview = file_get_contents ( "data/html/{$pg->id}.html" );
	$texternalreview = file_get_contents ( "data/html/externalreviews/{$pg->id}.html" );
	$toverview = <<<OV
        <div class="card text-center">
        <h2>Gaming Review: </h2>
        
  		<h2 class="card-title">{$pg->gamename}</h2>
  		<div class="row">
<div class="col-lg-7">
<br>
   <div class="card border-secondary mb-3">
   <div class="card-body">
 	<img class="img-thumbnail" src="$timg" width="256" />
  </div>
  </div>
</div>
  <div class="col-lg-4">
  <br>
  <div class="card text-center">
  <div class="card border-secondary mb-3">
  <div class="card-header">Age Rating:</div>
  <div class="card-body">
  <p class="card-text">{$pg->agerating}</p>
  </div>
  <div class="card-header">Release Date:</div>
  <div class="card-body">
  <p class="card-text">{$pg->releasedate}</p>
  </div>
  <div class="card-header">Genre:</div>
  <div class="card-body">
  <p class="card-text">{$pg->genre}</p>
  </div>
</div>
</div>
</div>
        
  <div class="card text-center">    		
  <div class="card border-secondary mb-3">
  <div class="card-header">Editorial Review:</div>
  <div class="card-body">
  <p class="card-text">{$tfullreview}</p>
  </div>
  </div>
    		
    <div class="card text-center">
    <div class="card border-secondary mb-3">
  <div class="card-header">External Review:</div>
  <div class="card-body">
  <p class="card-text">{$texternalreview}</p>
  </div>
  		
    </article>
OV;
	return $toverview;
}

function renderConsoleReviewOverview(BLLGame $pg) {
    $timgref = "img/consoleimg/{$pg->id}.jpeg";
    $timg = $timgref;
    $tfullreview = file_get_contents ( "data/html/consolereview/{$pg->id}.html" );
    $texternalreview = file_get_contents ( "data/html/extconsolereview/{$pg->id}.html" );
    $toverview = <<<OV
        <div class="card text-center">
        <h2>Gaming Review: </h2>
        
  		<h2 class="card-title">Nintendo Switch</h2>
  		<div class="row">
<div class="col-lg-7">
<br>
   <div class="card border-secondary mb-3">
   <div class="card-body">
 	<img class="img-thumbnail" src="$timg" width="256" />
  </div>
  </div>
</div>
  <div class="col-lg-4">
  <br>
  <div class="card text-center">
  <div class="card border-secondary mb-3">
  <div class="card-header">Age Rating:</div>
  <div class="card-body">
  <p class="card-text">{$pg->agerating}</p>
  </div>
  <div class="card-header">Console Price:</div>
  <div class="card-body">
  <p class="card-text">$279</p>
  </div>
  <div class="card-header">Console Release Date:</div>
  <div class="card-body">
  <p class="card-text">03/03/2017</p>
  </div>
</div>
</div>
</div>

  <div class="card text-center">
  <div class="card border-secondary mb-3">
  <div class="card-header">Editorial Review:</div>
  <div class="card-body">
  <p class="card-text-center">{$tfullreview}</p>
  </div>
  </div>
  
    <div class="card text-center">
    <div class="card border-secondary mb-3">
  <div class="card-header">External Review:</div>
  <div class="card-body">
  <p class="card-text">{$texternalreview}</p>
  </div>
  
    </article>
OV;
    return $toverview;
}

// =============RENDER PRESENTATION LOGIC OBJECTS==================================================================
function renderUICarousel(array $pimgs, $pimgdir, $pid = "mycarousel") {
	$tci = "";
	$count = 0;
	
	// -------Build the Images---------------------------------------------------------
	foreach ( $pimgs as $titem ) {
		$tactive = $count === 0 ? " active" : "";
		$thtml = <<<ITEM
        <div class="item{$tactive}">
            <img class="img-responsive" src="{$pimgdir}/{$titem->img_href}">
            <div class="container">
                <div class="carousel-caption">
                    <h1>{$titem->title}</h1>
                    <p class="lead">{$titem->lead}</p>
		        </div>
			</div>
	    </div>
ITEM;
		$tci .= $thtml;
		$count ++;
	}
	
	// --Build Navigation-------------------------
	$tdot = "";
	$tdotset = "";
	$tarrows = "";
	
	if ($count > 1) {
		for($i = 0; $i < count ( $pimgs ); $i ++) {
			if ($i === 0)
				$tdot .= "<li data-target=\"#{$pid}\" data-slide-to=\"$i\" class=\"active\"></li>";
			else
				$tdot .= "<li data-target=\"#{$pid}\" data-slide-to=\"$i\"></li>";
		}
		$tdotset = <<<INDICATOR
        <ol class="carousel-indicators">
        {$tdot}
        </ol>
INDICATOR;
	}
	if ($count > 1) {
		$tarrows = <<<ARROWS
		<a class="left carousel-control" href="#{$pid}" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#{$pid}" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
ARROWS;
	}
	
	$tcarousel = <<<CAROUSEL
    <div class="carousel slide" id="{$pid}">
            {$tdotset}
			<div class="carousel-inner">
				{$tci}
			</div>
		    {$tarrows}
    </div>
CAROUSEL;
	return $tcarousel;
}

?>