<?php

namespace Teo\DbConfigBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of DbConfigEntryRepository
 *
 * @author teito
 */
class DbConfigEntryRepository extends EntityRepository {

    public function persist($object) {
        $em = $this->getEntityManager();
        $em->persist($object);
        $em->flush();
    }

//    public function getLastLogMessageDatetime() {
//        $qb = $this->createQueryBuilder('q')
//                ->select('q.created')
//                ->orderBy('q.created', 'DESC')
//                ->setMaxResults(1);
//        return $qb->getQuery()->getSingleScalarResult();
//    }
    public function getEntryByName($name) {
        $q = $this->createQueryBuilder('q')
                ->where('q.name = :name')
                ->setParameter('name', $name)
                ->setMaxResults(1);
        return $q->getQuery()->getOneOrNullResult();
    }
}