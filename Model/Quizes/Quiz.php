<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Quizes;

use Egulias\QuizBundle\Model\Questions\Question;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Declaration of abstract class Quiz to allow the creation of multiple types of quizes
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
abstract class Quiz implements QuizInterface
{
    /**
     * To store quiz questions
     * @var $question array
     */
    protected $questions = array();

    protected $name = '';

    protected $type = 'Quiz';

    protected $uuid = '';

    public function __construct()
    {
        $this->questions = new ArrayCollection;
        $this->setUUID();
    }
    /**
     * Add a question to the quiz
     *
     * @param Question $q
     * @return Quiz for concatenation
     */
    public function addQuestion(Question $q)
    {
        $this->questions[] = $q;
        return $this;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function getQuestion($n = NULL)
    {
        if(is_null($n)) {
            $cur = $this->questions->current();
            $this->questions->next();
            return $cur;
        }
        else return $this->questions[$n];
    }
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    protected function setUUID()
    {
        if(!$this->uuid) {
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
