<?php

namespace Egulias\QuizBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AnswerRepository extends EntityRepository
{

    public function findByQuiz($quizId)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
          SELECT a FROM EguliasQuizBundle:Answer a
          JOIN a.quiz_question qq
          JOIN qq.quiz q
          WHERE q.id = :qid
          ORDER BY a.created, a.quizUuid
          ')->setParameter('qid', $quizId);
        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
