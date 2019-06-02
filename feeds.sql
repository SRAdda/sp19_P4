/*
  feeds.sql
  
  @author Sekllan ChenRuan
  @version 1
  
*/

#Drop table if exist---------------------------
DROP TABLE IF EXISTS sp19_newscategories;
DROP TABLE IF EXISTS sp19_feeds;
DROP TABLE IF EXISTS sp19_feedlinks;

#sp19_newscategories table create  -------------
CREATE TABLE sp19_newscategories(
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
Title VARCHAR(255) DEFAULT '',
PRIMARY KEY (CategoryID)
)ENGINE=INNODB; 

#insert category title into sp19_newscategories
INSERT INTO sp19_newscategories VALUES 
(NULL,1,'Seattle Entertainment');
INSERT INTO sp19_newscategories VALUES
(NULL,2,'Seattle Sports News'); 
INSERT INTO sp19_newscategories VALUES
(NULL,3,'Seattle Movie Scene'); 


#sp19_feeds table create ------------------------
CREATE TABLE sp19_feeds(
FeedID INT UNSIGNED NOT NULL AUTO_INCREMENT,
CategoryID INT UNSIGNED DEFAULT 0,
Title TEXT DEFAULT '',
PRIMARY KEY (FeedID)
CONSTRAINT sp19_feeds_ibfk_1
FOREIGN KEY (CategoryID) REFERENCES sp19_newscategories(CategoryID) ON DELETE CASCADE
)ENGINE=INNODB;

#insert feeds -----------------------------------
INSERT INTO sp19_feeds VALUES 
(NULL, 1, ' ');
INSERT INTO sp19_feeds VALUES 
(NULL, 1, ' ');
INSERT INTO sp19_feeds VALUES 
(NULL, 1, ' ');
INSERT INTO sp19_feeds VALUES 
(NULL, 2, ' ');
INSERT INTO sp19_feeds VALUES 
(NULL, 2, ' ');
INSERT INTO sp19_feeds VALUES 
(NULL, 2, ' ');
INSERT INTO sp19_feeds VALUES 
(NULL, 3, ' ');
INSERT INTO sp19_feeds VALUES 
(NULL, 3, ' ');
INSERT INTO sp19_feeds VALUES 
(NULL, 3, ' ');

#sp19_feedlinks table create --------------------
CREATE TABLE sp19_feedlinks (
  linkID int(10) unsigned NOT NULL AUTO_INCREMENT,
  FeedID int(10) unsigned DEFAULT '0',
  feedlink varchar(255) DEFAULT '',
  PRIMARY KEY (linkID),
  KEY FeedI (FeedID),
  CONSTRAINT sp19_feedlinks_ibfk_1 FOREIGN KEY (FeedID) REFERENCES sp19_feeds (FeedID) ON DELETE CASCADE
) ENGINE=InnoDB;

#insert links ------------------------------------
/* VALUES NuLL, FeedID, feedlink */
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
INSERT INTO sp19_feedlinks VALUES (NULL, 1, ' ');
/*
insert more links here


*/


