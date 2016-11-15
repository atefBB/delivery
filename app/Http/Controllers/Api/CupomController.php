<?php
namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Repositories\CupomRepository;

class CupomController
{

    /**
     * @var CupomRepository
     */
    private $cupomRepository;

    public function __construct(CupomRepository $cupomRepository)
    {
        $this->cupomRepository = $cupomRepository;
    }

    public function show($code)
    {
        return $this->cupomRepository->skipPresenter(false)->findByCode($code);
    }

}