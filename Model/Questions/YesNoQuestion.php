<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Questions;

use Egulias\QuizBundle\Model\Answers\Answer;
/**
 * Simple yes or no question
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class YesNoQuestion extends Question
{

    public function getText()
    {
        return (!$this->text)? $this->getName() : $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function addAnswer(Answer $a)
    {
        $this->answer = $a;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }
}
