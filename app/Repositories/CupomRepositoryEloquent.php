<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Models\Cupom;
use CodeDelivery\Presenters\CupomPresenter;
use CodeDelivery\Validators\CupomValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CupomRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class CupomRepositoryEloquent extends BaseRepository implements CupomRepository
{

    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cupom::class;
    }

    public function presenter()
    {
        return CupomPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByCode($code)
    {
        $result = $this->model
                       ->where('code', $code)
                       ->where('userd', 0)
                       ->first();

        if($result){
            return $this->parserResult($result);
        }

        throw (new ModelNotFoundException)->setModel(get_class($this->model));
    }
}
