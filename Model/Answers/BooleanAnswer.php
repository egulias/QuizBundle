<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Answers;

/**
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class BooleanAnswer extends Answer
{
    public function setResponse($response)
    {
        $this->response = ($response) ? TRUE : FALSE;
        return $this;
    }
}
