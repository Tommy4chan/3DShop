<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\OrdersService;
use App\Services\UtilsService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private UtilsService $utilsService;

    private OrdersService $orderService;

    private $statuses = ['Нова', 'Обробляється', 'Готова до доставки', 'Доставляється', 'Доставлено', 'Завершена', 'Скасована'];

    public function __construct(UtilsService $utilsService, OrdersService $orderService)
    {
        $this->utilsService = $utilsService;
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->orderService->index();

        return view('admin.order.index')->with('orders', $orders)->with('statuses', $this->statuses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $product = $this->utilsService->isProductExistOrActive($id, 'На жаль не можна зробити заявку на неіснуючий продукт');

        return view('order.form')->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $order = $this->orderService->store($request);

        session()->flash('order', $order->id);

        return redirect()->route('thanks');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = $this->utilsService->isOrderExist($id, 'На жаль не можна переглянути неіснуючу заявку');

        return view('order.show')->with('order', $order)->with('product', $order->product)->with('statuses', $this->statuses);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $this->orderService->update($request, $order);

        return redirect()->route('admin.order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
