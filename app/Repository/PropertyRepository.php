<?php
namespace App\Repository;

use App\Property;
use App\PropertyAnalytic;

class PropertyRepository
{
    private $model;

    public function __construct( Property $model )
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return Property
     */
    public function create(array $attributes):Property
    {
        return $this->model->create($attributes);
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
     * @param $propertyId
     * @return mixed
     */
    public function attachAnalytic(array $data, $propertyId)
    {
        return $this->find($propertyId)
            ->analyticTypes()
            ->attach([$data['analytic_id'] => ['value' => $data['value']]]);
    }

    /**
     * @param array $data
     * @param $propertyId
     * @return mixed
     */
    public function updateAttachedAnalytic(array $data, $propertyId)
    {
        return $this->find($propertyId)
            ->analyticTypes()
            ->updateExistingPivot($data['analytic_id'], ['value' => $data['value']]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAnalytic($id)
    {
        return $this->model->find($id)->analyticTypes()->get();
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function getQueryByCondition($key, $value)
    {
        return $this->model->where($key, $value);
    }

    public function getIdsByCondition($requestData)
    {
        $key = array_key_first($requestData);
        return $this->getQueryByCondition($key, $requestData[$key])->pluck('id')->toArray();
    }
}
