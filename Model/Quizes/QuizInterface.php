<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Quizes;

/**
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
interface QuizInterface
{
    public function setQuestions(array $questions);
    public function getQuestions();
    public function setName($name);
    public function getName();
    public function getUUID();

}
