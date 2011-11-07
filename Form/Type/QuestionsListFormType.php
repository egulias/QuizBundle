<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder
;

class QuestionsListFormType extends AbstractType
{
    protected $builder = null;

    public function buildForm(FormBuilder $builder, array $options)
    {
        $this->builder = $builder;
            $builder
                ->add('question', 'entity', array(
                    'required' => TRUE,
                    'class'    => 'EguliasQuizBundle:Question'
                ))
                ;
    }

    public function getName()
    {
        return 'question';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            //'data_class' => 'Egulias\QuizBundle\Entity\Question',
            'csrf_protection'  => FALSE
        );
    }

}
