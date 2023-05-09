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
         //using tip 2 for testing purposes
         $tid = 2;
         $likecount = tips::getLikes($tid);
         tips::addLike($tid);
         $updatedcount = tips::getLikes($tid);
         $this -> assertTrue($updatedcount == $likecount + 1);


    }

    public function testDislikeIncrement()
    {
        //using tip 2 for testing purposes
        $tid = 2;
        $dislikecount = tips::getDislikes($tid);
        tips::addLike($tid);
        $updatedcount = tips::getDislikes($tid);
        $this -> assertTrue($updatedcount == $dislikecount + 1);

    }

}

?>