<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Quizes;

use Egulias\QuizBundle\Model\Questions\Question;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Declaration of abstract class Quiz
 *
 */
/**
 * Quiz
 *
 * @uses QuizInterface
 * @abstract
 * @package QuizBundle
 * @subpackage Model
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
abstract class Quiz implements QuizInterface
{
    protected $uuid;

    public function __construct()
    {
        $this->questions = new ArrayCollection;
        $this->setUUID();
    }

    /**
     * setQuestions
     *
     * @param ArrayCollection $questions
     * @access public
     * @return Egulias\QuizBundle\Model\Quiz
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
        return $this;
    }

    /**
     * Get the current question pointed by the cursor
     *
     * @param integer $n
     * @access public
     * @return void
     */
    public function getQuestion($n = NULL)
    {
        if (is_null($n)) {
            $cur = $this->questions->current();
            $this->questions->next();
            return $cur;
        }
        else return $this->questions[intval($n)];
    }

    /**
     * @see QuizInterface
     */
    public function setUUID()
    {
        if (!$this->uuid) {
            $this->uuid = SHA1(uniqid('Q',TRUE));
        }
        return $this;
    }

    public function getUUID()
    {
        $this->setUUID();
        return $this->uuid;
    }
}

?>
