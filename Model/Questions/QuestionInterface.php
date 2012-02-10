<?php

namespace Egulias\QuizBundle\Model\Questions;

/**
 * QuestionInterface
 *
 * @package QuizBundle
 * @subpackage Model
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
interface QuestionInterface
{
    /**
     * setText
     *
     * @param mixed $text
     * @access public
     */
    public function setText($text);
    /**
     * getText
     *
     * @access public
     * @return mixed
     */
    public function getText();
    /**
     * setType
     *
     * @param mixed $type
     * @access public
     */
    public function setType($type);
    /**
     * getType
     *
     * @access public
     * @return mixed
     */
    public function getType();
}
