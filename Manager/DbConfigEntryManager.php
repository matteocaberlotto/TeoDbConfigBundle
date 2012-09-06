<?php

namespace Teo\DbConfigBundle\Manager;

use Teo\DbConfigBundle\Entity\DbConfigEntry as DbConfigEntry;
use Doctrine\ORM\EntityManager;
use Teo\DbConfigBundle\Repository\DbConfigEntryRepository;


/**
 * Description of DbConfigEntryManager
 *
 * @author teito
 */
class DbConfigEntryManager {

    protected $repository;

    public function __construct(DbConfigEntryRepository $repository) {
        $this->repository = $repository;
    }

    public function createNew() {
        return new DbConfigEntry();
    }

    public function persist($record) {
        $this->repository->persist($record);
    }

    public function getConfig($key, $default = false) {
        $entry = $this->getEntryByName($key);
        if (!is_null($entry)) {
            return $entry->getContent();
        }
        return $default;
    }

    public function saveConfig($key, $value) {
        $entry = $this->getEntryByName($key);
        if (is_null($entry)) {
            $entry = $this->createNew();
        }
        $entry->setName($key);
        $entry->setContent($value);
        $this->repository->persist($entry);
    }

    public function getEntryByName($key) {
        return $this->repository->getEntryByName($key);
    }
}

?>
