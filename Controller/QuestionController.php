<?php
namespace Egulias\QuizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Doctrine\Common\Util\Debug;


use Egulias\QuizBundle\Form\Type\QuestionFormType;
use Egulias\QuizBundle\Entity\QuizQuestion;
use Egulias\QuizBundle\Form\Type\QuestionOptionsFormType;
use Egulias\QuizBundle\Form\Type\QuestionsListFormType;

/**
 * QuestionController
 *
 * @category Controller
 * @package  QuizBundle
 * @author   Eduardo Gulias Davis <me@egulias.com>
 * @license  QuizBundle/Resources/meta/LICENSE
 *
 */
class QuestionController extends Controller
{
    /**
     * questionsPanelAction
     * Main question panel
     *
     * @return  Response
     * @Route("/quiz/questions", name ="egulias_quiz_question")
     */
    public function questionsPanelAction()
    {
        $questions = $this->get('doctrine.orm.entity_manager')
            ->getRepository('EguliasQuizBundle:Question')->findAll();
        return $this->render(
            'EguliasQuizBundle:Question:list.html.twig',
            array('questions' => $questions)
        );
    }

    /**
     * New Question Form
     *
     * @Route("/quiz/questions/create", name="egulias_quiz_question_add")
     *
     * @return  Response
     */
    public function createQuestionAction()
    {
        $q = $this->get('egulias.question.manager')->getQuestionForm();
        return $this->render(
            'EguliasQuizBundle:Question:questionForm.html.twig',
            array('form' => $q->createView())
        );
    }

    /**
     *  Save a question and its options
     *
     *  @return  RedirectResponse
     *  @Route("quiz/questions/save", name="egulias_question_save")
     */
    public function saveQuestionAction()
    {
        $this->get('egulias.question.manager')->saveQuestion();
        return $this->redirect($this->generateUrl('egulias_quiz_question'));
    }

    /**
     * Edit a Question
     *
     * @return  Response
     *
     * @Route ("/quiz/question/{id}/edit", requirements={"id" = "\d+"} ,name="egulias_quiz_question_edit")
     */
    public function editQuestionAction($id)
    {
        $question
            = $this->get('doctrine.orm.entity_manager')
                ->getRepository('EguliasQuizBundle:Question')
                ->findOneBy(array('id' => $id));
        $form = $this->get('form.factory')->create(new QuestionFormType(), $question);
        return $this->render(
            'EguliasQuizBundle:Quiz:questionForm.html.twig',
            array('form' => $form->createView(), 'id' =>$id)
        );
    }

    /**
     * Add Questions to a Quiz
     *
     * @return Response
     *
     * @Route ("/quiz/add/question", name="egulias_quiz_add_question")
     *
     */
    public function addQuestionAction()
    {
        $quizId = intval($this->get('request')->get('quiz'));
        $q = $this->get('form.factory')->create(new QuestionsListFormType());
        if ($quiz = $this->get('doctrine.orm.entity_manager')
            ->getRepository('EguliasQuizBundle:Quiz')
            ->findOneBy(array('id' => $quizId))
        ) {
            $qq = new QuizQuestion();
            $qq->setQuiz($quiz);
            $q->setData($qq);
        }
        return $this->render(
            'EguliasQuizBundle:Question:quizQuestionForm.html.twig',
            array('questionForm' => $q->createView(),
            )
        );
    }

}
