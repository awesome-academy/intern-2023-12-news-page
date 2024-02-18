<?php

namespace App\Repository;

use App\Repository\Resource\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function model()
    {
        return $this->model;
    }

    public function get($select = ['*'], array $options = [])
    {
        if (empty($options)) {
            return $this->model()->select($select)->get();
        }

        return $this->model()->where($options)->select($select)->get();
    }

    public function store(array $data)
    {
        return $this->model()->create($data);
    }

    public function delete($id)
    {
        return $this->model()->where('id', $id)->delete();
    }

    public function edit($id, array $data)
    {
        return $this->model()->where('id', $id)->update($data);
    }

    public function paginate($paginate, $search = [])
    {
        if (!empty($search)) {
            return $this->model()->where($search)->orderBy('created_at', 'DESC')->paginate($paginate);
        }

        return $this->model()->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public function find($search, $select = ['*'])
    {
        return $this->model()->where($search)->select($select)->first();
    }

    public function findById($id, $select = ['*'])
    {
        return $this->model()->where('id', $id)->select($select)->first();
    }

    public function searchLike($search, $value, $paginate = null)
    {
        if (!empty($paginate)) {
            return $this->model()->where($search, 'like', '%' . $value . '%')->paginate($paginate);
        }

        return $this->model()->where($search, 'like', '%' . $value . '%')->get();
    }

    public function findNewest($search)
    {
        return $this->model()->where($search)->orderBy('created_at', 'DESC')->first();
    }
}
