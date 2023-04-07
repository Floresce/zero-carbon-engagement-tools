<!-- This is a PHPUnit test script centered on testGenerateLikeDislikeButtons,
     checks the generation of HTML markup for two buttons(like and dislike) with the correct attributes and values. -->
<!-- Tested using: PHPUnit 10.0.19, PHP 8.1.10 -->
<?php
use PHPUnit\Framework\TestCase;

class GenerateLikeDislikeButtonsTest extends TestCase
{
    public function testGenerateLikeDislikeButtons()
    {
        // Set up test data for one row
        $tipId = '1';
        $row = [
            'C_NAME' => 'Category',
            'SUB_NAME' => 'Subcategory',
            'T_DESC_ENGLISH' => 'Tip description',
            'T_ID' => $tipId
        ];

        // Call function that generates like and dislike buttons
        $result = $this->generateLikeDislikeButtons($tipId);

        // Assert that the generated HTML markup contains the correct attributes and values
        $this->assertStringContainsString('id="likeBtn-' . $tipId . '"', $result);
        $this->assertStringContainsString('class="btn btn-success likeBtn"', $result);
        $this->assertStringContainsString('id="dislikeBtn-' . $tipId . '"', $result);
        $this->assertStringContainsString('class="btn btn-danger dislikeBtn"', $result);
    }

    public function generateLikeDislikeButtons($tipId = '') {
        $result = '<button id="likeBtn-' . $tipId . '" class="btn btn-success likeBtn" style="margin-left: 1em;"><i class="bi bi-hand-thumbs-up"></i></button>';
        $result .= '<button id="dislikeBtn-' . $tipId . '" class="btn btn-danger dislikeBtn"><i class="bi bi-hand-thumbs-down"></i></button>';
        return $result;
    }
}
?>
