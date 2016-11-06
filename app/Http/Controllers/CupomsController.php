<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Repositories\CupomRepository;

class CupomsController extends Controller
{

    /**
     * @var CupomRepository
     */
    private $cupomRepository;

    public function __construct(CupomRepository $cupomRepository)
    {
        $this->cupomRepository = $cupomRepository;
    }

    public function index()
    {
        $cupoms = $this->cupomRepository->paginate(5);

        return view("admin.cupoms.index", compact('cupoms'));
    }

    public function create()
    {
        return view("admin.cupoms.create");
    }

    public function store(AdminCupomRequest $request)
    {
        $data = $request->all();
        $this->cupomRepository->create($data);

        return redirect()->route('admin.cupoms.index');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(AdminCategoryRequest $request, $id)
    {
        $data = $request->all();
        $this->categoryRepository->update($data, $id);

        return redirect()->route('admin.categories.index');
    }
}
