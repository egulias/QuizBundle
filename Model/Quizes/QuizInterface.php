<?php
namespace Egulias\QuizBundle\Model\Quizes;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * QuizInterface
 *
 * @package QuizBundle
 * @subpackage Model
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
interface QuizInterface
{
    /**
     * setQuestions
     *
     * @param ArrayCollection $questions
     * @access public
     */
    public function setQuestions($questions);
    /**
     * getQuestions
     *
     * @access public
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function getQuestions();
    /**
     * setName
     *
     * @param mixed $name
     * @access public
     */
    public function setName($name);
    /**
     * getName
     *
     * @access public
     * @return mixed
     */
    public function getName();
    /**
     * setUUID
     * Internally sets the Quiz UUID
     *
     * @access public
     */
    public function setUUID();
    /**
     * getUUID
     *
     * @access public
     * @return string
     */
    public function getUUID();

}
