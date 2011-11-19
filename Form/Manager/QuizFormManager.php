<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Manager;

use Symfony\Component\HttpFoundation\Request;

use Egulias\QuizBundle\Form\Type\QuizFormType;
use Egulias\QuizBundle\Entity\Quiz;
use Egulias\QuizBundle\Entity\QuizQuestion;
use Doctrine\Common\Util\Debug;
/**
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class QuizFormManager
{
    protected $em = NULL;
    protected $request = NULL;
    protected $formFactory = NULL;


    public function __construct(Request $request, $em, $formFactory)
    {
        $this->em = $em;
        $this->request = $request;
        $this->formFactory = $formFactory;
    }

    /**
     *  Returns a QuizForm
     *
     *  @return QuizFormType
     */
    public function getQuizForm()
    {
        return $this->formFactory->create(new QuizFormType);
    }

    /**
     * Saves the quiz and its questions
     *
     * @return mixed FALSE | QuizFormType
     */
    public function saveQuizForm()
    {
        $form = $this->formFactory->create(new QuizFormType());
        $form->bindRequest($this->request);

        if(!$form->isValid())return $form;

        $quiz = $form->getData();
        $this->em->persist($quiz);
        $q = $quiz->getQuestions();
        foreach($q as $key => $question)
        {
            $qq = new QuizQuestion;
            $qq->setQuiz($quiz);
            $qq->setQuestion($question);
            $this->em->persist($qq);
        }
        $this->em->flush();

        return $form;
    }
    /**
     *  Allows the edition of a Quiz based on its ID
     *
     * @param int $id
     * @return mixed FALSE | QuizFormType
     * @throw \InvalidArgumentException
     */
    public function editQuizForm($id)
    {
        $id = intval($id);

        $repo = $this->em->getRepository('EguliasQuizBundle:Quiz');
        if(!$quiz = $repo->findOneBy(array('id' => $id))) {
            throw new \InvalidArgumentException("Invalid Quiz ID. Value given $id ");
        }

        $form = $this->getQuizForm();
        $form->setData($quiz);

        return $form;
    }

    /**
     *  Update a Quiz
     *
     *  @param int $id
     *  @return QuizFormType
     *  @throw \Exception
     */
    public function updateQuizForm($id)
    {
        $id = intval($id);
        try {
            //Quiz from DB
            if(!$quiz = $this->em->getRepository('EguliasQuizBundle:Quiz')->findOneBy(array('id' => $id))) {
                throw new \InvalidArgumentException("Invalid Quiz ID. Value given $id ");
            }
            //Form raw data
            $rawData = $this->request->get('quiz');

            $form = $this->getQuizForm();
            $form->bindRequest($this->request);

            if(!$form->isValid())return $form;

            $quizForm = $form->getData();
            $this->em->persist($quizForm);

            //Question submited in the form
            $formQuestions = $quizForm->getQuestions();
            //Questions from the persisted Quiz
            $quizQuestions = $quiz->getQuestions();
            //Update existing Questions
            foreach ($quizQuestions as $key => $qq) {
                if($formQuestions[$key] != $qq->getQuestion()) {
                    $qq->setQuestion($q[$key]);
                    $em->persist($qq);
                }
            }
            //Create/delete Questions
            foreach($formQuestions as $key => $question)
            {
                if(!isset($quizQuestions[$key])) {
                    $qq = new QuizQuestion;
                    $qq->setQuiz($quiz);
                    $qq->setQuestion($question);
                    $this->em->persist($qq);
                }
                else if(isset($rawData['questions'][$key]['delete'])) {
                    $qq = $this->em->getRepository('EguliasQuizBundle:QuizQuestion')
                        ->findBy(array(
                            'quiz' => $quiz->getId()
                        )
                    );
                    $this->em->remove($qq[$key]);
                }
            }
            $this->em->flush();
            return $form;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage(),0,$e);
        }
    }
}
