<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder,
    Egulias\QuizBundle\Form\EventListener\AddAnswerFieldSubscriber,
    Doctrine\Common\Util\Debug
;

class QuestionsAnswersFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $this->builder = $builder;

        $subscriber = new AddAnswerFieldSubscriber($builder->getFormFactory());
        $builder->addEventSubscriber($subscriber);

        $builder->add('id','hidden');
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
