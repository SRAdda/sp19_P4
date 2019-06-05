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

class feed {
    public $id;
    public $name;
    public $url;
    
    function __construct($myID) {      
        #set sql
        $sql = "SELECT feedName, feedID, feedUrl FROM sp19_feeds WHERE feedID = " . $myID;
        # connection comes first in mysqli (improved) function
        $result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));
        if (mysqli_num_rows($result) > 0)
        {
           while ($row = mysqli_fetch_assoc($result))
           {#set DB values to attributes for each row
                $this->id = (int)$row['feedID']; #process db var
                $this->name = htmlentities($row['feedName']);
                $this->url = dbOut($row['feedUrl']);
               
            }//while
        }//if
        
        mysqli_free_result($result); #free resources
    }
    
    #function to get feed 
    function getFeed() {
      $request = "https://news.google.com/rss/search?q={$this->url}&hl=en-US&gl=US&ceid=US:en";
      $response = file_get_contents($request);
      $xml = simplexml_load_string($response);
      print '<h1>' . $xml->channel->title . '</h1>';
      foreach($xml->channel->item as $story)
      {
        echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
        echo '<p>' . $story->description . '</p><br /><br />';
      }    
    }
}