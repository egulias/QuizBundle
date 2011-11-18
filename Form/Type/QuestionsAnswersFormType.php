<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder,
    Doctrine\Common\Util\Debug
;

class QuestionsAnswersFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $this->builder = $builder;

        $builder
            ->add('answer', new AnswerFormType()
        )
        ->add('id','hidden');
    }

    public function getName()
    {
        return 'quiz_question_answer';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Egulias\QuizBundle\Entity\QuizQuestion'
        );
    }

}
