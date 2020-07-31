<?php
namespace Sunriseqf\LaravelShop\Data\Goods\Models;
use Illuminate\Database\Eloquent\Model as BaseModel;


class Model extends BaseModel
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setConnection(config('data.goods.database.connection.name'));
    }
}