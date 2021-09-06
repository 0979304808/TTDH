<?php

namespace App\Core\Repositories\Contract;

interface BaseRepositoryInterface
{

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function firstOrCreate(array $attributes);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function update(array $attributes);

    /**
     * @return bool
     */
    public function delete();

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc');

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data);


    /**
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function findOneOrFail($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function findOneByOrFail(array $data);

    /**
     * @param array $data
     * @param int $perPage
     * @return
     */
    public function paginateArrayResults(array $data, int $perPage = 20);

    public function Unlink($path);

    public function deleteId($id);

    public function deleteAttribute(array $attribute);

}