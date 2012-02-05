<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Entity;

use
    Doctrine\ORM\Mapping as ORM;
use Egulias\QuizBundle\Model\Questions\QuestionChoices;

/**
 *
 * @ORM\Entity
 * @ORM\Table (name="choices")
 */
class Choices extends QuestionChoices
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

}
