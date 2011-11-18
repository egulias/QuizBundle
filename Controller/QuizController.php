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
        $quiz = $this->get('doctrine')->getEntityManager()->getRepository('EguliasQuizBundle:Quiz')->findOneBy(array('id'=> $id));

        $questions = $quiz->getQuestions();
        foreach($questions as $question) {
            $question->setAnswer(new Answer);
        }

        $form = $this->get('form.factory')->create(new QuizForm($quiz->getQuestions()), $quiz);
        return $this->render('EguliasQuizBundle:Quiz:take_quiz.html.twig', array('quizForm' => $form->createView(),
            'quiz' => $quiz));
    }

    /**
     * Quizes responses
     * @Route("/quiz/{id}/response",requirements={"id" = "\d+"} , name="egulias_quiz_save_response")
     */
    public function saveResponseAction($id)
    {
        $request = $this->get('request');
        $em = $this->get('doctrine')->getEntityManager();
        $quiz = $em->getRepository('EguliasQuizBundle:Quiz')->findOneBy(array('id'=> $id));

        $uuid = $quiz->getUUID();
        $form = $this->get('form.factory')->create(new QuizForm($quiz->getQuestions()));
        $form->bindRequest($request);

        $qQuestions = $form->getData()->getQuestions();
        foreach ($qQuestions as  $qq) {
            $formAnswer = $qq->getAnswer();
            $quizQuestion = $em->getRepository('EguliasQuizBundle:QuizQuestion')->findOneBy(array('id' =>
                $qq->getId()));
            $formAnswer->setQuizUuid($uuid);
            $formAnswer->setQuizQuestion($quizQuestion);
            $em->persist($formAnswer);

        }
        $em->flush();
        return $this->render('EguliasQuizBundle:Quiz:take_quiz.html.twig', array('quizForm' => $form->createView(),
            'quiz' => $quiz));
    }
}

