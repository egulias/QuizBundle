<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder
;
use Doctrine\Common\Util\Debug;

class ChoicesFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('config', 'choice', array(
            'expanded' => TRUE,
            'label' => 'Choose the choices presentation',
            'required' => FALSE,
            'choices' => array('radio' => 'Radio buttons', 'checkbox' => 'Checkboxes', 'select' => 'List'),
            )
        )
        ->add('choices','hidden')
        ;
    }

    public function getName()
    {
        return 'question_choices';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Egulias\QuizBundle\Entity\Choices'
        );
    }
}
