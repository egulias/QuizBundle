<?php

namespace Egulias\QuizBundle\Model\Answers;

interface AnswerResponseInterface
{
    function setValue($respose);
    function getValue();
    function getRawValue();

}
