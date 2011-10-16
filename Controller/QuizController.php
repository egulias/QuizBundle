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

use Egulias\QuizBundle\Form\Type\QuizFormType;
use Egulias\QuizBundle\Entity\Quiz;

class QuizController extends Controller
{
    /**
     * Quizes control panel
     * @Route("/quiz", name="egulias_quiz_panel")
     */
    public function controlPanelAction()
    {
        //    $poll = new Poll();
        //  $question = new YesNoQuestion();
        //$question->setText('yes no question');
        //  $poll->addQuestion($question);
        $quizForm = $this->get('form.factory')->create(new QuizFormType());
        return $this->render('EguliasQuizBundle:Quiz:index.html.twig', array('form' => $quizForm->createView()));
    }

    /**
     * Create a Quiz
     * @Route ("/quiz/save", name="egulias_quiz_save")
     */
    public function saveQuizAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        //$quizForm = $this->get('form.factory')->create(new QuizFormType());
        //$quizForm->bindRequest($this->get('request'));
        $request = $this->get('request');
        $quizData = $request->get('quiz');
        $questions = $request->get('questions');
        $quiz = new Quiz();
        $quiz->setName($quizData['name']);
        foreach($questions as $qId) {
            $q = $em->getRepository('EguliasQuizBundle:Question')->findOneBy(array('id' => $qId));
            $quiz->addQuestion($q);
        }
        $em->persist($quiz);
        //$em->persist($quizForm->getData());

        $em->flush();
        return $this->redirect($this->generateUrl('egulias_quiz_panel'));

    }

}


