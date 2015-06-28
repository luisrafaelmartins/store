<?php namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Promotions;
use Illuminate\Http\Request;

class PromotionsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Promotions Controller
	|--------------------------------------------------------------------------
	|
	| Manages the promotions
	|
	*/
	private $promotions;
	private $details;

	/**
	 * Create a new controller instance.
	 *
	 * @param Promotions $promotions
	 */
	public function __construct(Promotions $promotions)
	{
		$this->promotions = $promotions;
		$this->details = \Config::get('bo.promotions');
		$this->middleware('auth');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$records =$this->promotions
			->select(\DB::raw('id, name, designation, thumb_path, img_path, created_at, updated_at, start_at, end_at,
			if (discount_type = "Valor Fixo", concat(discount," €"), concat(discount," %")) as discount, discount_type'))
		->get();

		return view('admin.home',['records' => $records, 'details' => $this->details ]);
	}

	/**
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id){
		$discount_type = \Config::get('bo.discount_type_list');
		$products = Products::join("category","category.id","=","products.category_id")
			->join("type","type.id","=","products.type_id")
			->join("brand","brand.id","=","products.brand_id")
			->select(\DB::raw('products.id,products.name,products.designation, type.name as type,
			category.name as category, type.id as type_id, category.id as category_id,brand.name as brand,
			brand.id as brand_id, products.available, price, price_tax '))->get();
		$record = $this->promotions->find($id);
		$path = url("/admin/{$this->details['route']}/{$record->{$this->details['pk']}}");
		return view('admin.promotions.products',['record' => $record, 'details' => $this->details , 'path' => $path ,
			'discount_type' => $discount_type, 'products' => $products, 'selectedProducts' => $record->products]);
	}

	/**
	 * @return \Illuminate\View\View
     */
	public function create(){
		$discount_type = \Config::get('bo.discount_type_list');
		$path = url("/admin/{$this->details['route']}/");
		$products = Products::join("category","category.id","=","products.category_id")
			->join("type","type.id","=","products.type_id")
			->join("brand","brand.id","=","products.brand_id")
			->select(\DB::raw('products.id,products.name,products.designation, type.name as type, category.name as category, type.id as type_id, category.id as category_id,brand.name as brand, brand.id as brand_id, products.available, price, price_tax '))->get();

		return view('admin.promotions.products',['details' => $this->details, 'path' => $path, 'discount_type' => $discount_type, 'products' => $products]);
	}


	/**
	 * @param Request $request
	 * @return bool
     */
	public function store(Request $request){

		$this->promotions = $this->storeValues($request, $this->promotions);
		return redirect('admin/promotions');
	}

	/**
	 * @param Request $request
	 * @return mixed
     */
	public function update(Request $request){

		$this->promotions = $this->promotions->find($request->input('id'));

		$this->promotions = $this->storeValues($request, $this->promotions);
		return redirect('admin/promotions');
	}

	/**
	 * @param Request $request
	 * @return Products
	 */
	public function storeValues(Request $request){
		$this->promotions->name = $request->input('name');
		$this->promotions->designation = $request->input('designation');
		$this->promotions->thumb_path = $request->input('thumb_path');
		$this->promotions->img_path = $request->input('img_path');
		$this->promotions->start_at = $request->input('start_at');
		$this->promotions->end_at = $request->input('end_at');
		$this->promotions->discount = $request->input('discount');
		$this->promotions->discount_type = $request->input('discount_type');
		$this->promotions->products()->sync($request->input('products'));

		$this->promotions->save();
		return $this->promotions;

	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function destroy($id){

		$this->promotions = $this->promotions->find($id);
		$this->promotions->delete();

		return redirect('admin/promotions');
	}

}