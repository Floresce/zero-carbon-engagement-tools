<?php
require_once __DIR__ . '/../../tips.php';

use PHPUnit\Framework\TestCase;

class FeedbackTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
      $servername = "";   			     // servername intentionally left blank
      $database = "";					// database intentionally left blank                      
      $username = "";
      $password = "";
  
      $connectionInfo = array(
        "Database" => $database,
        "UID" => $username,
        "PWD" => $password
      );
  
      // Establish connection to Microsoft SQL Server database
      $this->conn = sqlsrv_connect($servername, $connectionInfo);
    }
    public function testLikeIncrement()
    {
         $tid = 2;
         $likecount = getLikes($tid);
         addFeeback($tid, TRUE);
         $updatedcount = tips::getLikes($tid);
         $this -> assertTrue($updatedcount == $likecount + 1);


    }

    public function testDislikeIncrement()
    {
        $tid = 2;
        $dislikecount = getDislikes($tid);
        addFeeback($tid, FALSE);
        $updatedcount = getDislikes($tid);
        $this -> assertTrue($updatedcount == $dislikecount + 1);

    }

}

?>