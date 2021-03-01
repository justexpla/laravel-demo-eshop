<?php


namespace App\Repositories\Shop;

use App\Repositories\CoreRepository;
use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository extends CoreRepository
{
    /** @var Model */
    protected $model;

    /**
     * @var ModelFilter
     */
    protected $filter = null;

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
        $model = clone $this->model;

        if ($this->hasFilter()) {
            $model = $model->filter(request()->all(), $this->filter);
        }

        return $model;
    }

    /**
     * Adds filter to queries in repository
     *
     * @param string $modelFilter FilterClass
     * @return $this
     */
    public function withFilter(string $modelFilter)
    {
        if (! is_subclass_of($modelFilter, ModelFilter::class)) {
            throw new \Exception("Class {$modelFilter} is not a filter.");
        }
        $this->filter = $modelFilter;

        return $this;
    }

    /**
     * Returns if repository has initialized filter
     *
     * @return bool
     */
    public function hasFilter()
    {
        return ! empty($this->filter);
    }
}
