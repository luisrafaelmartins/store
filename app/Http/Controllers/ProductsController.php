<?php namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Types;
use Illuminate\Http\Request;

class ProductsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Products Controller
	|--------------------------------------------------------------------------
	|
	| Manages the products
	|
	*/
	private $products;
	private $details;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Products $products)
	{
		$this->products = $products;
		$this->details = \Config::get('bo.products');
		$this->middleware('auth');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$records = $this->products->join("category","category.id","=","products.category_id")
			->join("type","type.id","=","products.type_id")
			->join("brand","brand.id","=","products.brand_id")
			->select(\DB::raw('products.id,products.name,products.designation, type.name as type, category.name as category, type.id as type_id, category.id as category_id,brand.name as brand, brand.id as brand_id, products.stock, products.available'))
			->get();

		return view('admin.home',['records' => $records, 'details' => $this->details ]);
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
		$path = url("/admin/{$this->details['route']}/{$record->{$this->details['pk']}}");
		return view('admin.record',['record' => $record, 'categories' => $categories->all(), 'brands' => $brands->all(), 'types' => $types->all(), 'details' => $this->details , 'path' => $path ]);
	}

	/**
	 * @return \Illuminate\View\View
     */
	public function create(){
		$categories = new Categories;
		$brands = new Brands ;
		$types = new Types;
		$path = url("/admin/{$this->details['route']}/");
		return view('admin.record',['categories' => $categories->all(), 'brands' => $brands->all(), 'types' => $types->all(), 'details' => $this->details, 'path' => $path]);
	}


	/**
	 * @param Request $request
	 * @return bool
     */
	public function store(Request $request){

		$this->products = $this->storeValues($request, $this->products);
		return redirect('admin/products');
	}

	/**
	 * @param Request $request
	 * @return mixed
     */
	public function update(Request $request){

		$this->products = $this->products->find($request->input('id'));

		$this->products = $this->storeValues($request, $this->products);
		return redirect('admin/products');
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

		return redirect('admin/products');
	}

}