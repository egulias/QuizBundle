<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder,
    Egulias\QuizBundle\Entity\QuizQuestions,
    Egulias\QuizBundle\Form\Type\AnswerFormType,
    Egulias\QuizBundle\Form\Type\QuestionsAnswersFormType,
    Egulias\QuizBundle\Model\Quizes\Quiz,
    Doctrine\Common\Util\Debug
;

class GenericQuizFormType extends AbstractType
{
    protected $builder = null;
    protected $qQuestions = array();
    protected $quiz = null;

    public function buildForm(FormBuilder $builder, array $options)
    {
        $this->builder = $builder;
        $builder->add('questions', 'collection', array(
            'type' => new QuestionsAnswersFormType(),
            )
        );
    }

    public function getName()
    {
        return 'generic_quiz';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Egulias\QuizBundle\Entity\Quiz'
        );
    }
}
