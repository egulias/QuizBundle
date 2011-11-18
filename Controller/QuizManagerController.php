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

class QuizManagerController extends Controller
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
        //$quizForm = $this->get('form.factory')->create(new QuizFormType());
        $quizForm = $this->get('egulias.quiz.manager')->getQuizForm();
        return $this->render('EguliasQuizBundle:Quiz:add_quiz.html.twig', array('form' => $quizForm->createView()));
    }
    /**
     * Save a Quiz
     * @Route ("/quiz/save", name="egulias_quiz_save")
     */
    public function saveQuizAction()
    {
        $quizForm = $this->get('egulias.quiz.manager')->saveQuizForm();
        return $this->redirect($this->generateUrl('egulias_quiz_panel'));

    }


    /**
     * Edit a Quiz
     * @Route ("/quiz/{id}/edit", requirements={"id" = "\d+"} ,name="egulias_quiz_edit")
     */
    public function editQuizAction($id)
    {
        $form = $this->get('egulias.quiz.manager')->editQuizForm($id);
        return $this->render('EguliasQuizBundle:Quiz:update_quiz.html.twig', array('form' => $form->createView(), 'id' =>
        $id));
    }

    /**
     * Update a Quiz
     * @Route ("/quiz/{id}/update", requirements={"id" = "\d+"}, name="egulias_quiz_update")
     */
    public function updateQuizAction($id)
    {
        $form = $this->get('egulias.quiz.manager')->updateQuizForm($id);
        return $this->render('EguliasQuizBundle:Quiz:update_quiz.html.twig', array('form' => $form->createView(), 'id'
            => $id));
    }
}


