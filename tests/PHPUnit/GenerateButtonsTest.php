<?php
use PHPUnit\Framework\TestCase;

class GenerateButtonsTest extends TestCase
{
    public function testGenerateLikeDislikeButton()
    {
      // Set up test data for one row
      $tipId = '1';

      // Call function that generates like and dislike buttons
      $result = $this->generateLikeDislikeButton($tipId);

      // Assert that the generated HTML markup contains the correct attributes and values
      $this->assertStringContainsString('id="likeBtn-' . $tipId . '"', $result);
      $this->assertStringContainsString('class="btn btn-success likeBtn"', $result);
      $this->assertStringContainsString('id="dislikeBtn-' . $tipId . '"', $result);
      $this->assertStringContainsString('class="btn btn-danger dislikeBtn"', $result);
		
    }
	
	public function testGenerateAddToPlanButton()
	{
	  // Set up test data for one row
	  $tipId = '1';

	  // Call function that generates the Add to Plan button
	  $result = $this->generateAddToPlanButton($tipId);

	  // Assert that the generated HTML markup contains the correct attributes and values
      $this->assertStringContainsString('id="atpBtn-' . $tipId . '"', $result);
      $this->assertStringContainsString('class="btn btn-atp atpBtn"', $result);
      $this->assertStringContainsString('id="atpDiv-' . $tipId . '"', $result);
      $this->assertStringContainsString('</div></div></div>', $result);
	}


	function generateLikeDislikeButton($tipId) {
	  // id="likeBtn-' . $tipId . '" sets the id attribute of the button to a unique string that includes the tips's ID, T_ID
	  // i.e. likeBtn-12 corresponds to the like button for tip 12
	  $result = '<button id="likeBtn-' . $tipId . '" class="btn btn-success likeBtn" style="margin-left: 1em;">';
	  $result .= '<span class="material-symbols-rounded">thumb_up</span></button>';
	  $result .= '<button id="dislikeBtn-' . $tipId . '" class="btn btn-danger dislikeBtn">';
	  $result .= '<span class="material-symbols-rounded">thumb_down</span></button>';
	  
	  return $result;
	}
	
	function generateAddToPlanButton($tipId) {
	  $result = '<a href="#" onclick="return false;" class="btn btn-atp atpBtn" id="atpBtn-' . $tipId . '">Add to Plan</a>';
	  $result .= '<div class="tipsCart" id="atpDiv-' . $tipId . '">';
	  $result .= '</div></div></div><br><br>';

	  return $result;
	}
}
?>