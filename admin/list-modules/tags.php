<div id="tagsBotaoTemplate">
<?php 

foreach($TAGS as $campo=>$infotags) {
	echo "<div class=\"container\">";
	echo "<div class=\"col-sm-1\"><strong>{$campo}</strong></div>";
	echo "<div class=\"col-sm-11\">";
	foreach($infotags as $taginfo) {
		$active = (isset($SEARCH[$campo]) && array_search($taginfo['tag'], $SEARCH[$campo])!==false) ? 'btn-success active' : 'btn-default'; //  active
		echo "<a href=\"{$taginfo['href']}\" class=\"btn btn-sm {$active}\" role=\"button\">{$taginfo['tag']}</a>";
	}
	echo "</div></div>";
}
?>
</div>