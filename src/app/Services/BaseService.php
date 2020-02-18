<?php

namespace ViralsPackage\ViralsBase\app\Services;

use Illuminate\Container\Container as Application;


abstract class BaseService
{
    /**
     * @var Model
     */
    protected $repository;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeRepository();
    }

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function repository();

    /**
     * Make Repository instance
     *
     * @throws \Exception
     *
     * @return Repository
     */
    public function makeRepository()
    {
        $repository = $this->app->make($this->repository());

        if (!$repository instanceof BaseRepository) {
            throw new \Exception("Class {$this->repository()} must be an instance of ViralsPackage\\ViralsBase\\app\\Repositories\\BaseRepository");
        }

        return $this->repository = $repository;
    }


    public function all()
    {
        return $this->repository->all();
    }

    public function paginate($perPage)
    {
        return $this->repository->paginate($perPage);
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function findOrFail($id)
    {
        $store = $this->repository->find($id);
        if (!$store) {
            return abort('404');
        }
        return $store;
    }

    public function update($data, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
