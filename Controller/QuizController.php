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
use Egulias\QuizBundle\Entity\QuizQuestion;

class QuizController extends Controller
{
    /**
     * Quizes control panel
     * @Route("/quiz", name="egulias_quiz_panel")
     */
    public function controlPanelAction()
    {
        $quizes = $this->get('doctrine')->getEntityManager()->getRepository('EguliasQuizBundle:Quiz')->findAll();
        return $this->render('EguliasQuizBundle:Quiz:index.html.twig', array('quizes' => $quizes));
    }

    /**
     *
     *
     * @Route("/quiz/add", name="egulias_quiz_add")
     */
    public function addAction()
    {
        $quizForm = $this->get('form.factory')->create(new QuizFormType());
        return $this->render('EguliasQuizBundle:Quiz:add_quiz.html.twig', array('form' => $quizForm->createView()));
    }
    /**
     * Save a Quiz
     * @Route ("/quiz/save", name="egulias_quiz_save")
     */
    public function saveQuizAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $request = $this->get('request');
        $form = $this->get('form.factory')->create(new QuizFormType());
        $form->bindRequest($request);
        $quiz = $form->getData();
        $em->persist($quiz);
        $q = $quiz->getQuestions();
        foreach($q as $key => $question)
        {
            $qq = new QuizQuestion;
            $qq->setQuiz($quiz);
            $qq->setQuestion($question);
            $em->persist($qq);
        }
        $em->flush();
        return $this->redirect($this->generateUrl('egulias_quiz_panel'));

    }


    /**
     * Edit a Quiz
     * @Route ("/quiz/{id}/edit", requirements={"id" = "\d+"} ,name="egulias_quiz_edit")
     */
    public function editQuizAction($id)
    {
        $repo = $this->get('doctrine')->getEntityManager()->getRepository('EguliasQuizBundle:Quiz');
        $quiz = $repo->findOneBy(array('id' => $id));
        $form = $this->get('form.factory')->create(new QuizFormType());
        $form->setData($quiz);
        return $this->render('EguliasQuizBundle:Quiz:update_quiz.html.twig', array('form' => $form->createView(), 'id' =>
        $id));
    }

    /**
     * Update a Quiz
     * @Route ("/quiz/{id}/update", requirements={"id" = "\d+"}, name="egulias_quiz_update")
     */
    public function updateQuizAction($id)
    {
        $repo = $this->get('doctrine')->getEntityManager()->getRepository('EguliasQuizBundle:Quiz');
        $quiz = $repo->findOneBy(array('id' => $id));
        $request = $this->get('request');
        $form = $this->get('form.factory')->create(new QuizFormType());
        $form->bindRequest($request);
        $em = $this->get('doctrine')->getEntityManager();

        $em->persist($form->getData());
        $q = $form->getData()->getQuestions();
        $quizQuestions = $em->getRepository('EguliasQuizBundle:QuizQuestion')->findBy(array('quiz' => $quiz->getId()));
        foreach ($quizQuestions as $key => $qq) {
            if($q[$key] != $qq->getQuestion()) {
                $qq->setQuestion($q[$key]);
                $em->persist($qq);
            }
        }
        foreach($q as $key => $question)
        {
            if(!isset($quizQuestions[$key])) {
                $qq = new QuizQuestion;
                $qq->setQuiz($quiz);
                $qq->setQuestion($question);
                $em->persist($qq);
            }
        }
        $em->flush();
        return $this->render('EguliasQuizBundle:Quiz:update_quiz.html.twig', array('form' => $form->createView(), 'id'
            => $id));
    }
}


