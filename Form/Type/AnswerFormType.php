<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder,
    Egulias\QuizBundle\Entity\Question
;
use Doctrine\Common\Util\Debug;

class AnswerFormType extends AbstractType
{
    private $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function buildForm(FormBuilder $builder, array $options)
    {
        $this->builder = $builder;
        $config =
            array(
            'required' => TRUE,
            'label'    => $this->question->getText(),
            );
        if ($this->question->getType() == 'choice') {
            $choices = $this->question->getChoices();
            $chConf = $choices->getConfig();
            switch ($choices->getType()) {
            case 'select':
                $config['expanded'] = FALSE;
                $config['multiple'] = FALSE;
                break;
            case 'checkbox':
                $config['expanded'] = TRUE;
                $config['multiple'] = TRUE;
                break;
            case 'radio':
            default:
                $config['expanded'] = TRUE;
                break;
            }
            $config['choices'] = $choices->getChoices();
        }
        $builder->add('response', $this->question->getType(), $config
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
