<?php namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductsFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];


     // This will filter 'company_id' OR 'company'
    public function company($id)
    {
        return $this->where('company_id', $id);
    }

    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('first_name', 'LIKE', "%$name%")
                ->orWhere('last_name', 'LIKE', "%$name%");
        });
    }

    public function mobilePhone($phone)
    {
        return $this->where('mobile_phone', 'LIKE', "$phone%");
    }

    public function setup()
    {
        $this->onlyShowDeletedForAdmins();
    }

    public function onlyShowDeletedForAdmins()
    {
        if(Auth::user()->isAdmin())
        {
            $this->withTrashed();
        }
    }
}
