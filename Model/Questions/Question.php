<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Questions;

/**
 * Declaration of class Question to allow the creation of multiple types of questions
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
abstract class Question
{
    protected $name = '';
    protected $text = '';

    abstract public function setText($text);
    abstract public function getText();
}
