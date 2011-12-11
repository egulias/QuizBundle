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

use Egulias\QuizBundle\Entity\Quiz;
use Egulias\QuizBundle\Entity\Answer;
use Egulias\QuizBundle\Entity\QuizQuestion;
use Egulias\QuizBundle\Form\Type\GenericQuizFormType as QuizForm;
use Egulias\QuizBundle\Form\Type\AnswerFormType as AnswerForm;
use Doctrine\Common\Collections\ArrayCollection;

class QuizController extends Controller
{
    /**
     * Quizes to be done!
     * @Route("/take/quiz/{id}",requirements={"id" = "\d+"} ,name="egulias_quiz_take")
     */
    public function takeQuizAction($id)
    {
        $form = $this->get('egulias.take.quiz')->takeQuiz($id);
        return $this->render('EguliasQuizBundle:Quiz:take_quiz.html.twig', array('quizForm' => $form->createView(),
            'quiz' => $form->getData()));
    }

    /**
     * Quizes responses
     * @Route("/quiz/{id}/response",requirements={"id" = "\d+"} , name="egulias_quiz_save_response")
     */
    public function saveResponseAction($id)
    {

        if(!$form = $this->get('egulias.take.quiz')->responseQuiz($id)) {
            return $this->render('EguliasQuizBundle:Quiz:take_quiz.html.twig', array('quizForm' => $form->createView(),
                'quiz' => $form->getData()));
        }
        return $this->redirect($this->generateUrl('egulias_quiz_panel'));
    }
}

