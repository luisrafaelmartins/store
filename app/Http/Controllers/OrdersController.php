<?php namespace App\Http\Controllers;


use App\Models\Products;
use App\Models\Orders;
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
			->select(\DB::raw(' name, concat(total, "€") as total, address, postal_code, phone, fax, shipemail, shipname, shipped, order_number, obs '))
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
		$categories = new Categories;
		$brands = new Brands ;
		$types = new Types;
		$record = $this->products->find($id);
		return view('admin.record',['record' => $record, 'categories' => $categories->all(), 'brands' => $brands->all(), 'types' => $types->all(), 'details' => $this->details  ]);
	}

	/**
	 * @return \Illuminate\View\View
     */
	public function create(){
		$categories = new Categories;
		$brands = new Brands ;
		$types = new Types;
		return view('admin.record',['categories' => $categories->all(), 'brands' => $brands->all(), 'types' => $types->all(), 'details' => $this->details ]);
	}


	/**
	 * @param Request $request
	 * @return bool
     */
	public function store(Request $request){

		$this->products = $this->storeValues($request, $this->products);
		return redirect('products');
	}

	/**
	 * @param Request $request
	 * @return mixed
     */
	public function update(Request $request){

		$this->products = $this->products->find($request->input('id'));

		$this->products = $this->storeValues($request, $this->products);
		return redirect('products');
	}

	/**
	 * @param Request $request
	 * @return Products
	 */
	public function storeValues(Request $request){
		$this->products->name = $request->input('name');
		$this->products->designation = $request->input('designation');
		$this->products->thumb_path = $request->input('thumb_path');
		$this->products->img_path = $request->input('img_path');
		if ($request->input('category_id') == -1){
			$category = new Categories;
			$category->name =$request->input('category');
			$category->save();
			$this->products->category_id = $category->id;
		}else{
			$this->products->category_id = $request->input('category_id');
		}
		if ($request->input('brand_id') == -1){
			$brand = new Brands();
			$brand->name =$request->input('brand');
			$brand->save();
			$this->products->brand_id = $brand->id;
		}else{
			$this->products->brand_id = $request->input('brand_id');
		}
		if ($request->input('type_id') == -1){
			$type = new Types();
			$type->name =$request->input('type');
			$type->save();
			$this->products->type_id = $type->id;
		}else{
			$this->products->type_id = $request->input('type_id');
		}
		$this->products->available = $request->input('available');
		$this->products->stock = $request->input('stock');
		$this->products->save();
		return $this->products;

	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function destroy($id){

		$this->products = $this->products->find($id);
		$this->products->delete();

		return redirect('products');
	}

}