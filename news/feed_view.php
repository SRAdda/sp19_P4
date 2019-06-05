<?php 
require 'include/feed.php';
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
startSession(); //wrapper for session_start()
//session_destroy();
//die();
# '../' works for a sub-folder.  use './' for the root  
//adds font awesome icons for arrows on pager
$config->loadhead .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
$config->loadhead .= '<link rel="stylesheet" href="../css/celurean-new.css">';

# check variable of item passed in - if invalid data, forcibly redirect back to demo_list.php page
if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
    $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}else{
   myRedirect(VIRTUAL_PATH . "news/index.php");
}

#Fills <title> tag. If left empty will default to $PageTitle in config_inc.php  
$config->titleTag = 'News Feed';
#Fills <meta> tags.  Currently we're adding to the existing meta tags in config_inc.php
$config->metaDescription = 'New aggregator project' . $config->metaDescription;
$config->metaKeywords = 'news, rss feeds'. $config->metaKeywords;
//adds font awesome icons for arrows on pager
$config->loadhead .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';


$Feed = new feed($myID); // create feed object
$feedresult = $Feed->getFeed(); //Creates the feed view

get_header(); #defaults to header_inc.php
    
 
?>
   
<h1>
    <?php    
    echo $Feed->name . ' ' . $config->titleTag;
    ?>
</h1>

<?php    
//show feed
echo $feedresult['result']; 
get_footer(); #defaults to footer_inc.php
?>