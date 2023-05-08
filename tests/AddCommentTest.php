<!-- This is a PHPUnit test script centered on testAddComment,
     checks if comments are inserted correctly with no errors during the insertion process. -->
<!-- Tested using: PHPUnit 10.0.19, PHP 8.1.10 -->
<?php
require_once 'tips.php';

use PHPUnit\Framework\TestCase;

class AddCommentTest extends TestCase {
  private $conn;

  protected function setUp(): void
  {
    $servername = "DESKTOP-UK8K0FD";       
    $database = "Tips";							      // DO NOT use original database when running tests                      
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

  public static function commentProvider()
  {
    return [
      [1, "This is a test comment", date("Y-m-d")],
      [2, "This is another test comment", date("Y-m-d")],
      [3, "This is a third test comment", date("Y-m-d")]
    ];
  }

  /**
   * @dataProvider commentProvider
   */
  public function testAddComment($tipId, $comment, $date) {
    // Call the addComment function with some sample inputs
    addComment($tipId, $comment, $date, $this->conn);

    // Verify that the comment was added successfully
    $expectedOutput = "<br>Comment added successfully.";
    $this->expectOutputString($expectedOutput);
  }
}
?>