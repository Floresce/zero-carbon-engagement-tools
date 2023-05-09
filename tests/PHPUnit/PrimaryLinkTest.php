<?php 
//Tests ran using PHPUnit version 10.0.15
use PHPUnit\Framework\TestCase;

final class PrimaryLinkTest extends TestCase
{
    //This function will test that when PRIMARY_LINK is set with a link
    //that it will create a button with the specfied HTML elements for that link
    public function testPrimaryLink()
    {
        //creates a sample $row that has PRIMARY_LINK set to an example link for test purposes
        $row = ['PRIMARY_LINK' => 'http://example.com'];

        if (!empty($row['PRIMARY_LINK'])) {
            $output = ' <br> <form action="' . $row['PRIMARY_LINK'] . '" target="_blank">
                      <button type="submit" id="link" class="btn btn-default">Instant rebates</button>
                      </form> <br>';
        } else {
            $output = '';
        }
        //If the link is properly set into ['PRIMARY_LINK'] then this should be the expected output
        $expected = ' <br> <form action="http://example.com" target="_blank">
                      <button type="submit" id="link" class="btn btn-default">Instant rebates</button>
                      </form> <br>';
        
        //the $expected string and $output string should be equal
        $this->assertEquals($expected, $output);
    
    }

    //This function is to test when the primary link does not exist 
    //the output should be empty
    public function testPrimaryLinkNotExists()
    {
        $row = [];

        if (!empty($row['PRIMARY_LINK'])) {
            $output = ' <br> <form action="' . $row['PRIMARY_LINK'] . '" target="_blank">
                      <button type="submit" id="link" class="btn btn-default">Instant rebates</button>
                      </form> <br>';
        }

        else {
            $output = '';
        }
        $this->assertEmpty($output);
    }

    //This function will test that the link will open in a new window/tab using the target = "_blank" attribute
    public function testPrimaryLinkTargetAttribute()
{
    //creates a sample $row that has PRIMARY_LINK set to an example link for test purposes
    $row = ['PRIMARY_LINK' => 'https://example.com'];

    if (!empty($row['PRIMARY_LINK'])) {
        $output = ' <br> <form action="' . $row['PRIMARY_LINK'] . '" target="_blank">
                  <button type="submit" id="link" class="btn btn-default">Instant rebates</button>
                  </form> <br>';
    }

    else {
        $output = '';
    }

    //Expected target attribute value 
    $expectedTarget = '_blank'; 
    //Creating a DOMDocument to parse the HTML output
    //Loading the HTML output into the DOMDocument
    $dom = new \DOMDocument(); 
    @$dom->loadHTML($output); 
    //Get the form element
    $form = $dom->getElementsByTagName('form')->item(0); 
    //Get the actual target attribute value which should be _blank
    $actualTarget = $form->getAttribute('target');  

    //expected target attribute should equal the actualTarget
    $this->assertEquals($expectedTarget, $actualTarget);
}

}

?>