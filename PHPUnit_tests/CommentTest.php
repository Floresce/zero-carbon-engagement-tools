<!-- This is a PHPUnit test script centered on testInsertComment,
     checks if comments are inserted correctly with no errors during the insertion process. -->
<!-- Tested using: PHPUnit 10.0.19, PHP 8.1.10 -->
<?php
require_once 'tips.php';

use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        $servername = "DESKTOP-UK8K0FD";       
        $database = "TipsTest";							  // DO NOT use original database when running tests                      
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
            [2, "Another test comment", date("Y-m-d H:i:s")],
            [3, "A third test comment", date("Y-m-d H:i:s")]
        ];
    }

    /**
     * @dataProvider commentProvider
     */
    public function testInsertComment($tipId, $comment, $date): void
    {
        // Sanitize the input by replacing special characters with their corresponding HTML entities
        $comment = filter_var($comment, FILTER_SANITIZE_SPECIAL_CHARS);

        // Get the current maximum COMMENT_SEQ value for the given T_ID
        $sql = "SELECT MAX(COMMENT_SEQ) AS max_seq FROM TIP_COMMENT WHERE T_ID = ?";
        $params = array($tipId);
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        $this->assertTrue($stmt !== false, "Failed to execute SQL query for fetching max_seq from TIP_COMMENT table. \n\tSQL query: $sql");

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        $maxSeq = $row['max_seq'];

        // Increment the maximum COMMENT_SEQ value and insert the new comment
        $newSeq = $maxSeq + 1;
        $sql = "INSERT INTO TIP_COMMENT (T_ID, COMMENT_SEQ, COMMENT, TIP_DATE) VALUES (?, ?, ?, ?)";
        $params = array($tipId, $newSeq, $comment, $date);
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        $this->assertTrue($stmt !== false, "Failed to insert comment into TIP_COMMENT table. \n\ttipId: $tipId, comment: $comment, date: $date");
    }
}
?>