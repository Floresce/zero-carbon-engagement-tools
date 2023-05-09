<?php 
use PHPUnit\Framework\TestCase;

class FeedbackTest extends TestCase
{
    
    public function testGetLikes()
    {
        //using tip 1 for testing purposes
        $tid = 1;
        $likes = 1;

        $likecount = tips::getLikes($tid);
        $this->assertSame($likes, $likecount);
    }

    public function testGetDislikes()
    {
         //using tip 1 for testing purposes
        $tid = 1;
        $dislikes = 1;

        $dislikecount = tips::getDislikes($tid);
        $this->assertSame($dislikes, $dislikecount);

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
        $dislikecount = tips::getLikes($tid);
        tips::addLike($tid);
        $updatedcount = tips::getLikes($tid);
        $this -> assertTrue($updatedcount == $dislikecount + 1);

    }

}

?>