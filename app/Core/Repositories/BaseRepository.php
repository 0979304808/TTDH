<?php

namespace App\Core\Repositories;

use App\Core\Repositories\Contract\BaseRepositoryInterface;
use App\Core\Traits\Helpful;
use App\Core\Traits\UploadTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class BaseRepository implements BaseRepositoryInterface
{

    use UploadTable;
    use Helpful;

    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function firstOrCreate(array $attributes)
    {
        return $this->model->firstOrCreate($attributes);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $attributes)
    {
        return $this->model->update($attributes);
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function delete()
    {
        try {
            return $this->model->delete();
        } catch (Exception $e) {
            throw new HttpResponseException(response()->json($e->getMessage()), 422);
        }
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $data
     * @return Collection
     */
    public function findBy(array $data)
    {
        return $this->model->where($data)->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }

    /**
     * @param array $data
     */
    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }

    /**
     * @param $id
     */
    public function findOneOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Paginate arrays
     * @param array $data
     * @param int $perPage
     */
    public function paginateArrayResults(array $data, int $perPage = 20)
    {
        $page = Input::get('page', 1);
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(
            array_values(array_slice($data, $offset, $perPage, true)),
            count($data),
            $perPage,
            $page,
            [
                'path' => app('request')->url(),
                'query' => app('request')->query()
            ]
        );
    }

    /**
     * Paginate arrays
     * @param $path
     */
    public function Unlink($path)
    {
        if ($path != null) {
            if (\File::exists('uploads/images/' . basename($path))) {
                return unlink('uploads/images/' . basename($path));
            }
        }
    }

    public function deleteId($id)
    {
        if ($id){
            $model = $this->model->find($id);
            if ($model){
                if ($model->delete()){
                    return $model;
                }
            }
        }
    }

    public function deleteAttribute(array $attribute)
    {
        if ($attribute){
            $model = $this->findOneBy($attribute);
            if ($model){
                if (isset($model->image)){
                    if ($model->image != null ){
                        $this->Unlink($model->image);
                    }
                }
                return $model->delete();
            }
        }
    }
}