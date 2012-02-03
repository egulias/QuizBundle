<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Quizes;

use Egulias\QuizBundle\Model\Questions\Question;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Declaration of abstract class Quiz
 *
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

    public function setQuestions(array $questions)
    {
        foreach ($questions as $question) {
            $this->questions->add($question);
        }
        return $this;
    }

    public function getQuestion($n = NULL)
    {
        if (is_null($n)) {
            $cur = $this->questions->current();
            $this->questions->next();
            return $cur;
        }
        else return $this->questions[$n];
    }

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
