<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder,
    Egulias\QuizBundle\Model\Questions\Question
;

class QuestionFormType extends AbstractType
{
    protected $builder = null;

    public function buildForm(FormBuilder $builder, array $options)
    {
        $this->builder = $builder;
            $builder
                ->add('name', 'text', array(
                    'required' => TRUE,
                    'trim'     => TRUE
                ))
                ->add('text', 'text', array(
                    'required' => TRUE,
                    'trim'     => TRUE
                ))
                ->add('type', 'choice', array(
                  'choices' => Question::getBaseTypes(),
                  'trim' => TRUE,
                  'required' => TRUE
                ))
                ->add('choices','text')
                ;
    }

    public function getName()
    {
        return 'question';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Egulias\QuizBundle\Entity\Question'
        );
    }

}
