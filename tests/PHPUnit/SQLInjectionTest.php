<?php
require_once __DIR__ . '/../../tips.php';

use PHPUnit\Framework\TestCase;

class SQLInjectionTest extends TestCase {
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

    $this->conn = sqlsrv_connect($servername, $connectionInfo);
  }

  public static function sqlInjectionProvider()
  {
    return [
      [1, "This is a test comment", date("Y-m-d H:i:s")],
      [2, "'; DROP TABLE TIP_COMMENT;--", date("Y-m-d H:i:s")],
      [3, "A third test comment; SELECT * FROM USERS", date("Y-m-d H:i:s")]
    ];
  }

  /**
   * @dataProvider sqlInjectionProvider
   */
	public function testAddCommentWithSQLInjection($tipId, $comment, $date) {
	  // Sanitize input
	  $originalComment = $comment;
	  $comment = sanitizeInput($comment);

	  // Call the function with test data containing SQL injection attempts
	  addComment($tipId, $comment, $date, $this->conn);

	  // Verify that the comment was added to the database correctly
	  $sql = "SELECT COMMENT FROM TIP_COMMENT WHERE T_ID = ?";
	  $params = array($tipId);
	  $stmt = sqlsrv_query($this->conn, $sql, $params);
	  $this->assertNotFalse($stmt);

	  $comments = array();
	  while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) 
    {
		  $comments[] = $row['COMMENT'];
	  }

	  // Check that the input has been sanitized correctly
	  $this->assertStringNotContainsString("'", $comment, "Single quote not sanitized");
	  $this->assertStringNotContainsString(";", $comment, "Semicolon not sanitized");
	  $this->assertStringNotContainsString("--", $comment, "Comment not sanitized");

	  // Output the original and sanitized comments
	  echo "\n\tOriginal comment: " . $originalComment;
	  echo "\n\tSanitized comment: " . $comment . "\n";
	}
}
?>
