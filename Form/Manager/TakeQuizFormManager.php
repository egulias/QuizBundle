<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Manager;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Doctrine\ORM\EntityManager;

use Egulias\QuizBundle\Form\Type\GenericQuizFormType as QuizForm;
use Egulias\QuizBundle\Entity\Answer;
use Egulias\QuizBundle\Event\QuizEvents;
use Egulias\QuizBundle\Event\PreSaveQuizResponseEvent;
use Doctrine\Common\Util\Debug;
/**
 * Class to manage Quiz submission and responses
 *
 * @package    EguliasQuizBundle
 * @subpackage Form
 * @author     Eduardo Gulias Davis <me@egulias.com>
 */
class TakeQuizFormManager
{
    protected $em = null;
    protected $request = null;
    protected $formFactory = null;
    protected $dispatcher = null;


    /**
     * @param Request         $request     The Request taking place
     * @param EntityManager   $em          The current em
     * @param FormFactory     $formFactory The from factory for creating the forms
     * @param EventDispatcher $dispatcher  For custom events
     *
     */
    public function __construct(
        Request $request,
        EntityManager $em,
        FormFactory $formFactory,
        EventDispatcher $dispatcher
    ) {
        $this->em = $em;
        $this->request = $request;
        $this->formFactory = $formFactory;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Obtain a Quiz form with questions and answer fields
     *
     * @param int $id Quiz Id
     * @return Egulias\QuizBundle\Form\Type\GenericQuizFormType
     * @throw \InvalidArgumentException
     */
    public function takeQuiz($id)
    {
        $id = intval($id);
        try
        {
            $quiz = $this->getQuiz($id);
            $questions = $quiz->getQuestions();
            foreach ($questions as $question) {
                $question->setAnswer(new Answer());
            }

            $form = $this->formFactory->create(new QuizForm(), $quiz);
            return $form;

        }
        catch (\Exception $e)
        {
            throw new \Exception($e->getMessage(), 0, $e);
        }
    }

    /**
     * Saves Quiz responses
     *
     * @param int $id Quiz ID
     *
     * @return Egulias\QuizBundle\Form\Type\GenericQuizFormType $form
     * @throw \Exception
     */
    public function responseQuiz($id)
    {
        try {
            $quiz = $this->getQuiz($id);
            $uuid = $quiz->getUUID();
            $form = $this->takeQuiz($id);
            $form->bindRequest($this->request);
            $qQuestions = $form->getData()->getQuestions();
            $answers = array();

            foreach ($qQuestions as  $qq) {
                $formAnswer = $qq->getAnswer();

                $quizQuestion = $this->em->getRepository('EguliasQuizBundle:QuizQuestion')
                    ->findOneBy(array('id' => $qq->getId()));

                $q = $qq->getQuestion();//$quizQuestion->getQuestion();
                $type = $q->getType();
                if ($type == 'choice') {
                    $choices = $q->getChoices();
                    if ($choices->getType() == 'radio') {
                        //Compatible with PHP 5.3.x
                        $choices = $choices->getChoices();
                        $formAnswer->setResponse(
                            array(
                                $formAnswer->getResponse() => $choices[$formAnswer->getResponse()]
                            )
                        );
                    }
                }
                $formAnswer->setQuizUuid($uuid);
                $formAnswer->setQuizQuestion($quizQuestion);
                $answers[] = $formAnswer;
            }
            //quiz.response event
            $event = new PreSaveQuizResponseEvent($quiz, $answers);
            $this->dispatcher->dispatch(QuizEvents::PRE_SAVE_RESPONSE, $event);

            foreach ($answers as $answer) {
                $this->em->persist($answer);
            }
            $this->em->flush();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 0, $e);
        }
        // $event = new PostSaveResponseQuizEvent($quiz, $qQuestions);
        // $this->dispatcher->dispatch(QuizEvents::POST_SAVE_RESPONSE, $event);

        return $form;
    }

    /**
     * getQuiz
     *
     * @param int $id Quiz ID
     *
     * @return Quiz
     */
    private function getQuiz($id)
    {
        if (!$quiz = $this->em->getRepository('EguliasQuizBundle:Quiz')->findOneBy(array('id'=> $id))) {
            throw new \InvalidArgumentException("Invalid Quiz ID. Value given $id ");
        }
        return $quiz;
    }
}
