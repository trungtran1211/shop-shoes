<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use DB;
class ProductController extends Controller
{
    //
    public function getProduct(){
        $data['productlist'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
        return view('backend.product',$data);
    }
    public function getAddProduct(){
        $data['catelist'] = Category::all();
    	return view('backend.addproduct',$data);
    }
    public function postAddProduct(Request $request){
    	
        $filename = $request->img->getClientOriginalName();
        DB::table('vp_products')->insert([
            
            'prod_name' => $request->name,
            'prod_slug' => str_slug($request->name),
            'prod_img' => $filename,
            'prod_accessories' => $request->accessories,
            'prod_price' => $request->price,
            'prod_warranty' => $request->warranty,
            'prod_promotion'=>$request->promotion,
            'prod_condition' => $request->condition,
            'prod_status' => $request->status,
            'prod_description' => $request->description,
            'soluongcon' => $request->soluongcon,
            'soluongban' => $request->soluongban,
            'prod_cate' => $request->cate,
            'prod_featured' => $request->featured,

            
        ]);
        $request->img->storeAS('avatar', $filename);
        return back();
    }


    public function getEditProduct($id){
        $data = Product::select('*')->where('prod_id', $id)->first();
        $data1['listcate'] = Category::all();
    	return view('backend.editproduct',compact('data'),$data1);
    }

    public function postEditProduct(Request $request,$id){
    	$product = new Product;
        $arr['prod_name'] = $request->name;
        $arr['prod_slug'] = str_slug($request->name);
        $arr['prod_accessories'] = $request->accessories;
        $arr['prod_price'] = $request->price;
        $arr['prod_warranty'] = $request->warranty;
        $arr['prod_promotion'] =$request->prod_promotion;
        $arr['prod_condition'] = $request->condition;
        $arr['prod_status'] = $request->status;
        $arr['prod_description'] = $request->description;
        $arr['prod_cate'] = $request->cate;
        $arr['prod_featured'] = $request->featured;
        if ($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $arr['prod_img'] = $img;
            $request->img->storeAs('avatar'.$img);
        }
        $product::where('prod_id',$id)->update($arr);
        return redirect('admin/product');
    }
    public function getDeleteProduct($id){
        Product::where('prod_id',$id)->delete();
        return back();
    	
    }

    public function khachhang()
    {
        $title = 'Kh??ch h??ng';
        return view('backend.khachhang.danhsach', compact('title'));
    }
    public function binhluan()
    {
        $title = 'B??nh lu???n Kh??ch H??ng';
        return view('backend.binhluan.danhsach', compact('title'));
    }
    public function lichsu()
    {
        $title = 'L???ch s??? mua h??ng c???a kh??ch h??ng';
        return view('backend.khachhang.lichsu', compact('title'));
    }
    public function bill()
    {
        $title = 'H??a ????n';
        return view('backend.donhang.danhsach', compact('title'));
    }
    
    public function nhanvien()
    {
        $title = 'Danh s??ch nh??n vi??n';
        return view('backend.nhanvien.danhsach', compact('title'));
    }
    public function addnhanvien()
    {
        $title = 'Th??m nh??n vi??n';
        return view('backend.nhanvien.add', compact('title'));
    }
    public function Slide()
    {
        $title = 'Slide qu???ng c??o';
        return view('backend.quangcao.danhsach', compact('title'));
    }
    public function addslide()
    {
        $title = 'Th??m Slide qu???ng c??o';
        return view('backend.quangcao.them', compact('title'));
    }
    public function updateslide()
    {
        $title = 'Update Slide qu???ng c??o';
        return view('backend.quangcao.sua', compact('title'));
    }
}
