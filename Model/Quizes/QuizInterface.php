<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Quizes;

/**
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
interface QuizInterface
{
    public function addQuestion(Question $q);
    public function getQuestions();
}
