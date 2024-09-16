<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class BaseService
{ 
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll($paginate, $search = null, $fields = [] , $orderBy = 'id', $order = 'ASC')
    {
        $query = $this->model->newQuery();

        if ($search) {
            $query->where(function ($q) use ($search, $fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', '%' . $search . '%');
                }
            });
        }

        return $query->paginate($paginate);
    }

    public function create($request)
    {
        return $this->model->create($request->all());
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function updateStatus($id)
    {
        $item = $this->model->find($id);
        if ($item) {
            $item->status = !$item->status;
            $item->update();
        }
    }

    public function update($request, $id)
    {
        $item = $this->model->find($id);
        if ($item) {
            $item->update($request->all());
            return $item;
        }
        return null;
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
