<?php

namespace Egulias\QuizBundle\Form\Manager;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

use Egulias\QuizBundle\Form\Type\QuestionFormType;
use Egulias\QuizBundle\Entity\Quiz;
use Egulias\QuizBundle\Entity\QuizQuestion;
use Doctrine\Common\Util\Debug;

/**
 * QuizFormManager
 *
 * @package EguliasQuizBundle
 * @subpackage Form
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class QuestionFormManager
{
    protected $em = NULL;
    protected $request = NULL;
    protected $formFactory = NULL;

    public function __construct(Request $request, EntityManager $em, $formFactory)
    {
        $this->em = $em;
        $this->request = $request;
        $this->formFactory = $formFactory;
    }

    /**
     * getQuestionForm
     *
     * @access public
     * @return QuestionFormType
     */
    public function getQuestionForm()
    {
        return $this->formFactory->create(new QuestionFormType());
    }

    /**
     * saveQuestion
     *
     * @access public
     * @return QuestionFormType
     */
    public function saveQuestion()
    {
        $form = $this->getQuestionForm();
        $data = $this->request->get('question');

        $temp = array();
        foreach ($data['choices'] as $k => $choice) {
            if (!is_int($k))continue;
            $temp[$choice['label']] = $choice;
            unset($data['choices'][$k]);
        }
        $data['choices']['choices'] = $temp;

        $form->bind($data);
        $this->em->persist($form->getData());
        $this->em->flush();

        return $form;
    }

    /**
     * editQuestion
     *
     * @param int $id
     * @access public
     * @return QuestionFormType
     */
    public function editQuestion($id)
    {
        $id = intval($id);

        $question = $this->em->getRepository('EguliasQuizBundle:Question') ->findOneBy(array('id' => $id));

        if (!$question) {
            throw new \InvalidArgumentException("Invalid Question ID. Value given $id ");
        }

        $form = $this->getQuestionForm();
        $form->setData($question);

        return $form;
    }

}
