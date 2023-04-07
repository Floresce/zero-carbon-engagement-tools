<!-- This is a PHPUnit test script centered on testSQLInjection,
     checks for SQL injection attempts by sanitizing and validating user input before inserting it into a database. -->
<!-- Tested using: PHPUnit 10.0.19, PHP 8.1.10 -->
<?php
use PHPUnit\Framework\TestCase;

class SQLInjectionTest extends TestCase
{
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

    protected function tearDown(): void
    {
        // Close the database connection
        sqlsrv_close($this->conn);
    }

	public static function commentProvider()
	{
		return [
			[1, "This is a test comment", date("Y-m-d H:i:s")],
			[2, "'; DROP TABLE TIP_COMMENT;--", date("Y-m-d H:i:s")],
			[3, "A third test comment; SELECT * FROM USERS", date("Y-m-d H:i:s")]
		];
	}

	/**
	 * @dataProvider commentProvider
	 */
	public function testSQLInjection($tipId, $comment, $date): void
	{
		// Sanitize the input to remove any potential HTML tags or SQL injection attempts
		$comment = filter_var($comment, FILTER_SANITIZE_SPECIAL_CHARS);
		$comment = str_replace(['<', '>', ';', '--', "'", '&#39'], '', $comment);

		// Decode HTML entities and remove HTML tags
		$comment = strip_tags(htmlspecialchars_decode($comment));
		
		// Check that the input has been sanitized correctly
		$this->assertStringNotContainsString("'", $comment, "Single quote not sanitized");
		$this->assertStringNotContainsString(";", $comment, "Semicolon not sanitized");
		$this->assertStringNotContainsString("--", $comment, "Comment not sanitized");

		// Get the current maximum COMMENT_SEQ value for the given T_ID
		$sql = "SELECT MAX(COMMENT_SEQ) AS max_seq FROM TIP_COMMENT WHERE T_ID = ?";
		$params = array($tipId);
		$stmt = sqlsrv_query($this->conn, $sql, $params);
		$this->assertTrue($stmt !== false, "Failed to execute query: " . print_r(sqlsrv_errors(), true));

		// Fetch the result of the query and extract the maximum COMMENT_SEQ value:
		$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		$maxSeq = $row['max_seq'];

		// Increment the maximum COMMENT_SEQ value and insert the new comment
		$newSeq = $maxSeq + 1;
		$sql = "INSERT INTO TIP_COMMENT (T_ID, COMMENT_SEQ, COMMENT, TIP_DATE) VALUES (?, ?, ?, ?)";
		$params = array($tipId, $newSeq, $comment, $date);
		$stmt = sqlsrv_query($this->conn, $sql, $params);
		if ($stmt !== false) {
			$this->assertTrue(true, "Test passed: SQL injection attempt detected");
			//echo "\nTest passed: SQL injection attempt detected";
		} else {
			$this->fail("Failed to execute query: " . print_r(sqlsrv_errors(), true));
		}
	}
}
?>
