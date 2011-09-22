<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Answers;

/**
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class Answer
{
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
