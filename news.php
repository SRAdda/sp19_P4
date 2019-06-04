<?php
/* news.php  */

require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials

$config->titleTag = smartTitle(); #Fills <title> tag. If left empty will fallback to $config->titleTag in config_inc.php
$config->metaDescription = smartTitle() . ' - ' . $config->metaDescription; 

get_header(); #defaults to header_inc.php
?>

<h3 align="center"><?php echo $config->titleTag; ?></h3>

<html>
<div class="container">
<h3 align="center">Seattle Lifestyle</h3>


<div align="center">Seattle Entertainment and News</div>

<table class="table table-hover">
<thead>
<tr>
<th scope="col">Categories</th>
</tr>
</thead>
<tbody>

 <tr>
<td><a href="sallyra.dreamhosters.com/itc250-sp19/feeds/subcategories.php?id=1">Movie News and Listings</a></td>
</tr>

 <tr>
<td><a href="http://sallyra.dreamhosters.com/itc250-sp19/feeds/subcategories.php?id=2">Live Theatre Around Seattle</a></td>
</tr>

 <tr>
<td><a href="http://sallyra.dreamhosters.com/itc250-sp19/feeds/subcategories.php?id=3">Sports News and Events</a></td>
</tr>



</tbody>
</table>
</div>
</div>
<?php
get_footer(); #defaults to footer_inc.php
?>
