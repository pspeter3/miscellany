<?php

namespace App\Services;

use App\Exceptions\TranslatableException;
use Illuminate\Support\Facades\Auth;
use App\Models\MiscModel;
use Exception;

class BulkService
{
    /**
     * @var EntityService
     */
    protected $entityService;

    /**
     * BulkService constructor.
     * @param EntityService $entityService
     */
    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
    }

    /*
     *
     */
    public function delete($entityName, $ids = [])
    {
        $model = $this->getEntity($entityName);

        $count = 0;
        foreach ($ids as $id) {
            $entity = $model->find($id);
            if (Auth::user()->can('delete', $entity)) {
                //dd($entity->descendants);
                $entity->delete();
                $count++;
            }
        }

        return $count;
    }

    /**
     * @param $entityName
     * @param array $ids
     * @return array
     * @throws Exception
     */
    public function export($entityName, $ids = [])
    {
        $model = $this->getEntity($entityName);
        $entities = [];
        foreach ($ids as $id) {
            $entities[] = $model->findOrFail($id);
        }
        return $entities;
    }

    /**
     * @param $entityName
     * @param array $ids
     * @return int
     */
    public function makePrivate($entityName, $ids = [])
    {
        return $this->switchPrivate($entityName, true, $ids);
    }

    /**
     * @param $entityName
     * @param array $ids
     * @return int
     */
    public function makePublic($entityName, $ids = [])
    {
        return $this->switchPrivate($entityName, false, $ids);
    }

    /**
     * @param string $entityName
     * @param bool $private
     * @param array $ids
     * @return int
     * @throws TranslatableException
     */
    protected function switchPrivate($entityName, $private = true, $ids = [])
    {
        if (!Auth::user()->isAdmin()) {
            throw new TranslatableException("crud.bulk.errors.admin");
        }

        // Don't want other stuff happening while saving
        define('MISCELLANY_SKIP_ENTITY_CREATION', true);

        $model = $this->getEntity($entityName);
        $count = 0;
        foreach ($ids as $id) {
            /** @var MiscModel $entity */
            $entity = $model->findOrFail($id);
            if (Auth::user()->can('update', $entity) && $entity->is_private != $private) {
                // Todo: still needed?
                //$entity->savingObserver = false;
                $entity->is_private = $private;
                $entity->save();
                $count++;
            }
        }

        return $count;
    }

    /**
     * @param $entityName
     * @return mixed
     * @throws Exception
     */
    protected function getEntity($entityName)
    {
        $entity = $this->entityService->getClass($entityName);
        if (empty($entity)) {
            throw new Exception("Unknown entity name $entityName.");
        }

        $model = new $entity();
        if (empty($model)) {
            throw new Exception("Couldn't create a class from $entity.");
        }

        return $model;
    }
}
