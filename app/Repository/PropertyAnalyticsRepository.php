<?php


namespace App\Repository;


use App\Models\PropertyAnalytic;

class PropertyAnalyticsRepository
{
    private $model;

    public function __construct(PropertyAnalytic $propertyAnalytic)
    {
        $this->model = $propertyAnalytic;
    }

    /**
     * @param array $ids
     * @return mixed
     */
    public function getByIds(array $ids)
    {
        return $this->model->whereIn('id', $ids)->get();
    }
    /**
     * @param array $ids
     * @return array
     */
    public function getSummery(array $ids)
    {
        $data = $this->getByIds($ids);
        $count = $data->count();
        if ($count == 0) {
            return [];
        }
        $notNullPercentage = ( $data->whereNotNull('value')->count() * 100 ) /$count;
        return [
            'min' => $data->min()->value,
            'max' => $data->max()->value,
            'median' => $data->sum('value') / $data->count(),
            'notNullPercentage' => $notNullPercentage,
            'nullPercentage' => 100 - $notNullPercentage
        ];
    }
}
