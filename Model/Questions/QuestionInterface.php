<?php

namespace Egulias\QuizBundle\Model\Questions;

interface QuestionInterface
{
    public function setText($text);
    public function getText();
    public function setType($type);
    public function getType();
}
