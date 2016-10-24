<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminOrderRequest;
use CodeDelivery\Http\Requests\Request;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;

class OrdersController extends Controller
{

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->paginate(5);


        return view("admin.orders.index", compact('orders'));
    }

    public function edit($id, UserRepository $userRepository)
    {
        $list_status = [
            0 => 'Pendente',
            1 => 'À caminho',
            2 => 'Entregue',
            3 => 'Cancelado'
        ];

        $deliveryman = $userRepository->getDeliverymen();
        $order = $this->orderRepository->find($id);

        return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
    }

    public function update(AdminOrderRequest $request, $id)
    {

        $data = $request->all();
        $this->orderRepository->update($data, $id);
        return redirect()->route('admin.orders.index');
    }

}
