<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\RedirectResponse,
    Symfony\Component\HttpFoundation\Response,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    JMS\SecurityExtraBundle\Annotation\Secure,
    Doctrine\Common\Util\Debug
;

use Egulias\QuizBundle\Form\Type\QuestionFormType;
use Egulias\QuizBundle\Entity\QuizQuestion;
use Egulias\QuizBundle\Form\Type\QuestionOptionsFormType;
use Egulias\QuizBundle\Form\Type\QuestionsListFormType;

class QuestionController extends Controller
{
    /**
     * Main question panel
     * @Route("/quiz/questions", name ="egulias_quiz_question")
     */
    public function questionsPanelAction()
    {

    }

    /**
     *  New Question Form
     *  @Route("/questions/create", name="egulias_quiz_question_add")
     */
    public function createQuestionAction()
    {
        $q = $this->get('form.factory')->create(new QuestionFormType());
        return $this->render('EguliasQuizBundle:Question:questionForm.html.twig', array('form' => $q->createView()));
    }

    /**
     *  Save a question and its options
     *  @Route("questions/save", name="egulias_question_save")
     */
    public function saveQuestionAction()
    {
        $questionForm = $this->get('form.factory')->create(new QuestionFormType());
        $questionForm->bindRequest($this->get('request'));
        $em = $this->get('doctrine')->getEntityManager();
        $em->persist($questionForm->getData());
        $em->flush();
        return $this->redirect($this->generateUrl('egulias_quiz_question_add'));

    }
    /**
     * Add Questions to a Quiz
     * @Route ("/quiz/add/question", name="egulias_quiz_add_question")
     */
    public function addQuestionAction()
    {
        $quizId = intval($this->get('request')->get('quiz'));
        $q = $this->get('form.factory')->create(new QuestionsListFormType());
        if($quiz = $this->get('doctrine.orm.entity_manager')->getRepository('EguliasQuizBundle:Quiz')->findOneBy(array('id' => $quizId))) {
            $qq = new QuizQuestion();
            $qq->setQuiz($quiz);
            $q->setData($qq);
        }
        return $this->render('EguliasQuizBundle:Question:quizQuestionForm.html.twig', array('questionForm' => $q->createView(),
        ));
    }


}
