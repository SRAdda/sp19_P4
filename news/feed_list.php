<?php
/**
 * index.php
 * 
 * @package nmPager
 * @author Sekllan ChenRuan <example@gmail.com>
 * @version 1 06/04/2019
 * @link http://sekllancr.dreamhosters.com/itc250sp19/news
 * @license https://www.apache.org/licenses/LICENSE-2.0
 * @todo none
 */
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
spl_autoload_register('MyAutoLoader::NamespaceLoader');//required to load SurveySez namespace objects
$config->metaRobots = 'no index, no follow';#never index feed pages
#Fills <title> tag. If left empty will default to $PageTitle in config_inc.php  
$config->titleTag = 'News Feed';


# check variable of item passed in - if invalid data, forcibly redirect back to feeds/index.php page
if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}else{
	myRedirect(VIRTUAL_PATH . "news/index.php");
}
get_header(); 
?>

<h3 align="center">Feeds</h3>
<?php
$sql = "SELECT feedName, feedID FROM sp19_feeds WHERE categoryID=" . $myID;
$prev = '<i class="fa fa-chevron-circle-left"></i>';
$next = '<i class="fa fa-chevron-circle-right"></i>';
# Create instance of new 'pager' class
$myPager = new Pager(10,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql);  #load SQL, add offset
//$sqlRSS = "select Description from sm18_News_Feeds where FeedID=" . $feedID;
# connection comes first in mysqli (improved) function
$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));
if(mysqli_num_rows($result) > 0)
{#records exist - process
	if($myPager->showTotal()===1){$item = "Feed";}else{$item = "Feeds";}  //deal with plural
    echo '<div align="center">We have ' . $myPager->showTotal() . ' ' . $item . '!</div>';
    
    echo '
    
        <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Feeds</th>
        </tr>
      </thead>
         <tbody>
    
    ';
    
	while($row = mysqli_fetch_assoc($result))
	{# process each row
        
        echo '
                 <tr>
              <td><a href="' . VIRTUAL_PATH . 'news/feed_view.php?id=' . (int)$row['feedID'] . '">' . dbOut($row['feedName']) . '</a></td>
            </tr>
            
            
        ';
        
    }
    echo '
             </tbody>
        </table>
    ';
	echo $myPager->showNAV(); # show paging nav, only if enough records	 
}else{#no records
    echo "<div align=center>There are currently no feeds.</div>";	
}
@mysqli_free_result($result);
get_footer(); #defaults to theme footer or footer_inc.php