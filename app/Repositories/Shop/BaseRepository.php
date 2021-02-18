<?php


namespace App\Repositories\Shop;

use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository extends CoreRepository
{
    /** @var Model */
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * Method returns class full name
     *
     * @return string Model class full name
     */
    abstract protected function getModelClass(): string;

    /**
     * Start conditions
     *
     * @return Model
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
