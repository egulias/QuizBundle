<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Questions;

use Egulias\QuizBundle\Model\Questions\QuestionInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Declaration of class Question to allow the creation of multiple types of questions
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
abstract class Question implements QuestionInterface
{
    const TEXT = 'text';
    const TEXTAREA = 'textarea';
    const NUMBER = 'number';
    const BOOLEAN = 'boolean';
    const CHOICE = 'choice';

    public static function getBaseTypes()
    {
        $t = array(
            self::TEXT      => self::TEXT,
            self::TEXTAREA  => self::TEXTAREA,
 //           self::NUMBER    => self::NUMBER,
 //           self::BOOLEAN   => self::BOOLEAN,
            self::CHOICE    => self::CHOICE,
        );
        return $t;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
