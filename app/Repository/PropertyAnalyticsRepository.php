<?php


namespace App\Repository;


use App\PropertyAnalytic;

class PropertyAnalyticsRepository
{
    private $model;

    public function __construct( PropertyAnalytic $propertyAnalytic )
    {
        $this->model = $propertyAnalytic;
    }

    /**
     * @param array $ids
     * @return mixed
     */
    public function getByIds( array $ids )
    {
        return $this->model->whereIn('id', $ids)->get();
    }
    /**
     * @param array $ids
     * @return array|string
     */
    public function getSummery( array $ids )
    {
        $data = $this->getByIds($ids);
        $count = $data->count();
        if ( $count != 0 ) {
            return [
                'min' => $data->min()->value,
                'max' => $data->max()->value,
                'median' => $data->sum('value') / $data->count(),
                'notNullPercentage' => ( $data->whereNotNull('value')->count() * 100 ) /$count,
                'NullPercentage' => ( $data->whereNull('value')->count() * 100 ) /$count
            ];
        }
        return 'Nothing was found';
    }
}
