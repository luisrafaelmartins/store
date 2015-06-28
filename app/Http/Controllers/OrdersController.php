<?php namespace App\Http\Controllers;


use App\Models\Products;
use App\Models\Orders;
use App\Models\OrdersDetails;
use Illuminate\Http\Request;

class OrdersController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Orders Controller
	|--------------------------------------------------------------------------
	|
	| Works with the orders of made through the website
	|
	*/
	private $orders;
	private $details;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Orders $orders)
	{
		$this->orders = $orders;
		$this->details = \Config::get('bo.orders');
		$this->middleware('auth');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = $this->orders
			->select(\DB::raw('id, name, concat(total, "€") as total, address, postal_code, phone, fax, shipemail, shipname, shipped, order_number, obs '))
			->get();

		return view('admin.home',['records' => $orders, 'details' => $this->details ]);
	}

	/**
	 * @param $id
	 * @return \Illuminate\View\View
	 * @internal param Products $products
	 * @internal param Categories $categories
	 * @internal param Brands $brands
	 * @internal param Types $types
	 */
	public function edit($id){
		$record = $this->orders->find($id);
		$path = url("/admin/{$this->details['route']}/{$record->{$this->details['pk']}}");
		return view('admin.orders.details',['record' => $record, 'details' => $this->details , 'path' => $path]);
	}


	/**
	 * @param Request $request
	 * @return bool
     */
	public function store(Request $request){

		$this->orders = $this->storeValues($request, $this->orders);
		return redirect('admin/orders');
	}

	/**
	 * @param Request $request
	 * @return mixed
     */
	public function update(Request $request){
		$this->orders = $this->orders->find($request->input('id'));
		$this->orders = $this->storeValues($request, $this->orders);

		return redirect('admin/orders');
	}

	/**
	 * @param Request $request
	 * @return Products
	 */
	public function storeValues(Request $request){


		$this->orders->shipped = $request->input('shipped');
		$this->orders->shipname= $request->input('shipname');
		$this->orders->shipemail= $request->input('shipemail');
		$this->orders->phone = $request->input('phone');
		$this->orders->save();
		return $this->orders;

	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function destroy($id){

		$this->orders = $this->orders->find($id);
		$this->orders->delete();

		return redirect('orders');
	}

}