<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder,
    Egulias\QuizBundle\Model\Questions\Question,
    Egulias\QuizBundle\Model\Quizes\Quiz,
    Egulias\QuizBundle\Entity\QuizQuestion
;

class AnswerFormType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $this->builder = $builder;

        $builder
            ->add('response', 'text', array(
                'required' => TRUE,
                'trim'     => TRUE,
            )
        );
    }

    public function getName()
    {
        return 'answer';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Egulias\QuizBundle\Entity\Answer'
        );
    }

}
