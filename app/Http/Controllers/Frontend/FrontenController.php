<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\About;
use App\Models\Communicate;
use App\Models\Product;
use App\Models\ProductSubImage;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Review;
use App\Models\Service;
use App\Models\FaqCategory;
use App\Models\Faq;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Promotion;
use App\Models\Offer;
use App\Models\Brand;
use App\Models\RecentProduct;
use App\Models\Banner;
use App\Models\Subscriber;
use App\Models\SubCategory;
use Mail;
use DB;
use App\Models\User;
use Auth;
use DateTime;
use Session;
use Xenon\LaravelBDSms\Facades\SMS;
use App\Models\QrcodeModel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;
use App\Models\Shortlink;
use Str;


class FrontenController extends Controller
{

    public function default(){
        $data['allData'] = Shortlink::orderBy('id','desc')->get();
        return view('frontend.shortlink.index',$data);
        //return redirect()->route('login');
    }

    public function sub(){
        $data['allData'] = Shortlink::orderBy('id','desc')->get();
        return view('frontend.shortlink.index',$data);
    }

    // public function default(){
    //     $data['allData'] = QrcodeModel::orderBy('id','desc')->get();
    //     return view('frontend.qrcode.index',$data);
        //return redirect()->route('login');
    // }

    public function QrcodeDownload($id){
        $portal = QrcodeModel::where('id', $id)->first();
        $portal_link = $portal->portal_link;
        //dd($portal_link);
        $qrCode = QrCode::format('png')->size(300)->generate($portal_link);

        return Response::make($qrCode, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="qrcode.png"',
        ]);

    }


    public function index(){
        // $foo = "105";
        // $xx = number_format((float)$foo, 2, '.', '');
        // dd($xx);
        // $x = is_float(23.05);
        // if($x){
        //     dd('decimal');
        // }else{
        //     dd('integer');
        // }
        // dd($x);
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['sliders'] = Slider::all();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['promotions'] = Promotion::all();
        $data['offers'] = Offer::all();
        $data['category'] = Category::where('status','1')->first();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['home_sub_categories'] = SubCategory::where('status','1')->get()->take(8);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['sales_products'] = Product::orderBy('id','desc')->where('old_collective_price','0')->orWhere('old_delivery_price','0')->get()->take(40);
        $data['new_arrivals'] = Product::orderBy('id','desc')->where('product_status','like','%New Arrival%')->take('21')->get();
        $data['page_title'] = "home_title";
        $data['about'] = About::first();
        return view('frontend.layouts.home',$data);
    }

    public function allSubCategory(Request $request){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['all_sub_categories'] = Product::select('sub_category_id')->groupBy('sub_category_id')->get();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $min_value = $request->min_value;
        $max_value = $request->max_value;
        if($min_value && $max_value){
            $data['products'] = Product::whereBetween('current_collective_price', [$min_value, $max_value])->orderBy('id','desc')->paginate(8);
        }else{
            $data['products'] = Product::orderBy('id','desc')->paginate(8);
        }
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.sub-category-list',$data);
    }

    public function allNewArrival(Request $request){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['products'] = Product::orderBy('id','desc')->paginate(4);
        $data['all_sub_categories'] = Product::select('sub_category_id')->groupBy('sub_category_id')->get();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $min_value = $request->min_value;
        $max_value = $request->max_value;
        if($min_value && $max_value){
            $data['new_arrivals'] = Product::whereBetween('current_collective_price', [$min_value, $max_value])->orderBy('id','desc')->where('product_status','like','%New Arrival%')->paginate(8);
        }else{
            $data['new_arrivals'] = Product::orderBy('id','desc')->where('product_status','like','%New Arrival%')->paginate(8);
        }
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.newarrival_product_list',$data);
    }

    public function allBestSeller(Request $request){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['products'] = Product::orderBy('id','desc')->paginate(4);
        $data['all_sub_categories'] = Product::select('sub_category_id')->groupBy('sub_category_id')->get();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $min_value = $request->min_value;
        $max_value = $request->max_value;
        if($min_value && $max_value){
            $data['best_sellers'] = Product::whereBetween('current_collective_price', [$min_value, $max_value])->orderBy('id','desc')->where('product_status','like','%Best Seller%')->paginate(8);
        }else{
            $data['best_sellers'] = Product::orderBy('id','desc')->where('product_status','like','%Best Seller%')->paginate(8);
        }
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.bestseller_product_list',$data);
    }

    public function allPopular(Request $request){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['products'] = Product::orderBy('id','desc')->paginate(4);
        $data['all_sub_categories'] = Product::select('sub_category_id')->groupBy('sub_category_id')->get();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $min_value = $request->min_value;
        $max_value = $request->max_value;
        if($min_value && $max_value){
            $data['populars'] = Product::whereBetween('current_collective_price', [$min_value, $max_value])->orderBy('id','desc')->where('product_status','like','%Popular%')->paginate(8);
        }else{
            $data['populars'] = Product::orderBy('id','desc')->where('product_status','like','%Popular%')->paginate(8);
        }
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.popular_product_list',$data);
    }

    public function allSales(Request $request){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['products'] = Product::orderBy('id','desc')->paginate(4);
        $data['all_sub_categories'] = Product::select('sub_category_id')->groupBy('sub_category_id')->get();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $min_value = $request->min_value;
        $max_value = $request->max_value;
        if($min_value && $max_value){
            $data['sales_products'] = Product::whereBetween('current_collective_price', [$min_value, $max_value])->orderBy('id','desc')->where('old_collective_price','!=','0')->orWhere('old_delivery_price','!=','0')->paginate(8);
        }else{
            $data['sales_products'] = Product::orderBy('id','desc')->where('old_collective_price','!=','0')->orWhere('old_delivery_price','!=','0')->paginate(8);
            // dd($data['sales_products']->toArray());
        }
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.allsales_product_list',$data);
    }

    public function categoryWiseProduct(Request $request,$category_id){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['home_sub_categories'] = Product::select('sub_category_id')->groupBy('sub_category_id')->get()->take(8);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $min_value = $request->min_value;
        $max_value = $request->max_value;
        if($min_value && $max_value){
            $data['products'] = Product::whereBetween('current_collective_price', [$min_value, $max_value])->where('category_id',$category_id)->orderBy('id','desc')->paginate(8);
        }else{
            $data['products'] = Product::where('category_id',$category_id)->orderBy('id','desc')->paginate(8);
        }
        return view('frontend.single_pages.category_wise_product',$data);
    }

    public function subCategoryWiseProduct(Request $request,$sub_category_id){
        $min_value = $request->min_value;
        $max_value = $request->max_value;
        if($min_value && $max_value){
            $data['products'] = Product::whereBetween('current_collective_price', [$min_value, $max_value])->where('sub_category_id',$sub_category_id)->orderBy('id','desc')->paginate(8);
        }else{
            $data['products'] = Product::where('sub_category_id',$sub_category_id)->orderBy('id','desc')->paginate(8);
        }
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['home_sub_categories'] = Product::select('sub_category_id')->groupBy('sub_category_id')->get()->take(8);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        return view('frontend.single_pages.sub_category_wise_product',$data);
    }

    public function productDetails(Request $request,$slug){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['home_sub_categories'] = Product::select('sub_category_id')->groupBy('sub_category_id')->get()->take(8);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $product = Product::with(['product_img','brand'])->where('slug',$slug)->first();
        $data['product'] = $product;
        $data['related_products'] = Product::where('category_id',$data['product']->category_id)->get()->take(10);
        $data['reviews'] = Review::where('product_id',$product->id)->where('status','1')->orderBy('id','desc')->get();
        $data['review_count'] = Review::where('product_id',$product->id)->where('status','1')->orderBy('id','desc')->count();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        if (@Auth::user()->id!=NULL) {
            $resentProduct = new RecentProduct();
            $resentProduct->user_id = Auth::user()->id;
            $resentProduct->product_id = $product->id;
            $resentProduct->save();
            return view('frontend.single_pages.product-details',$data);
        }else{
            return view('frontend.single_pages.product-details',$data);
        }
    }

    public function aboutUs(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['banner'] = Banner::where('id','1')->first();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
    	return view('frontend.single_pages.about-us',$data);
    }

    public function contactUs(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['banner'] = Banner::where('id','2')->first();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
    	return view('frontend.single_pages.contact-us',$data);
    }

    public function termsCondition(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['terms'] = TermCondition::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['banner'] = Banner::where('id','3')->first();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.terms_condition',$data);
    }

    public function privacyPolicy(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['privacy'] = PrivacyPolicy::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['banner'] = Banner::where('id','4')->first();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.privacy_policy',$data);
    }

    public function helpFaq(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['faq_categories'] = Faq::select('faq_category_id')->groupBy('faq_category_id')->get();
        $data['banner'] = Banner::where('id','5')->first();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.help_faq',$data);
    }

    public function sevice(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['service'] = Service::all();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['banner'] = Banner::where('id','6')->first();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.services',$data);
    }

    public function shoppingCart(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.shopping-cart',$data);
    }

    public function findHomeProduct(Request $request){
        $slug = $request->slug;
        $productData = DB::table('products')
                            ->where('slug', 'LIKE', '%'.$slug.'%')
                            ->orderBy('id','desc')->get()->take(50);
        $html = '';
        $html .= '<div class="result-search"><ul class="list-result">';
            if($productData){
                foreach ($productData as $v) {
                    $html .='
                                <li class="cart-item">
                                    <div class="ps-product--mini-cart">
                                        <a href="'.route('products.details.info',$v->slug).'">
                                            <img class="ps-product__thumbnail" src="public/upload/product_images/'.$v->image.'">
                                        </a>
                                        <div class="ps-product__content">
                                            <a class="ps-product__name" href="'.route('products.details.info',$v->slug).'"><u>'.$v->name.'</u>
                                            </a>
                                            <p class="ps-product__meta"> <span class="ps-product__price">Col: £'.$v->current_collective_price.' ,Del: £'.$v->current_delivery_price.'</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            ';
                }
            }

        $html .= '</ul></div>';
        return response()->json($html);
    }

    public function findOtherProduct(Request $request){
        $slug = $request->slug;
        $productData = DB::table('products')
                            ->where('slug', 'LIKE', '%'.$slug.'%')
                            ->orderBy('id','desc')->get()->take(50);
        $html = '';
        $html .= '<div class="result-search"><ul class="list-result">';
            if($productData){
                foreach ($productData as $v) {
                    $html .='
                                <li class="cart-item">
                                    <div class="ps-product--mini-cart">
                                        <a href="'.route('products.details.info',$v->slug).'">
                                            <img class="ps-product__thumbnail" src="../public/upload/product_images/'.$v->image.'">
                                        </a>
                                        <div class="ps-product__content">
                                            <a class="ps-product__name" href="'.route('products.details.info',$v->slug).'"><u>'.$v->name.'</u>
                                            </a>
                                            <p class="ps-product__meta"> <span class="ps-product__price">Col: £'.$v->current_collective_price.' ,Del: £'.$v->current_delivery_price.'</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            ';
                }
            }

        $html .= '</ul></div>';
        return response()->json($html);
    }

    public function searchProduct(Request $request){
        $search = $request->input('search');
        $product = Product::query()
                    ->where('name', 'LIKE', "%{$search}%")
                    ->paginate(8);

        $data['products'] = $product;
        $data['search_for'] = $search;
         $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.search_product_list', $data);
    }

    public function findProduct(Request $request){
        $search = $request->input('slug');
        $product = Product::query()
                    ->where('name', 'LIKE', "%{$search}%")
                    ->paginate(8);

        $data['products'] = $product;
        $data['search_for'] = $search;
         $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";
        return view('frontend.single_pages.search_product_list', $data);
    }

    public function subscribeStore(Request $request){
        $this->validate($request,[
            'email'=>'required|unique:subscribers,email'
        ]);
        $data = new Subscriber();
        $data->email = strip_tags($request->email);
        $data->save();
        Session::flash('subscribeMessage','You have successfully subscribed!');
        return redirect()->back();
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'msg'=>'required'
        ]);
        // $contact = new Communicate();

        // $contact->name = strip_tags($request->name);
        // $contact->email = strip_tags($request->email);
        // $contact->subject = strip_tags($request->subject);
        // $contact->msg = strip_tags($request->msg);

        // $contact->save();

        // $check_email = Communicate::first();
        // $check_email = 'asadullahkpi@gmail.com';
        // $backend_email = $check_email->email;

        // $data = [
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'subject'=>$request->subject,
        //     'msg'=>$request->msg
        // ];
        // Mail::send('frontend.email.contact_page', $data, function ($message) use ($data,$backend_email){
        //     $message->from($data['email'],$data['name']);
        //     $message->to($backend_email);
        //     $message->subject($data['subject']);
        // });

        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'msg'=>$request->msg
        );

        Mail::send('frontend.emails.contact',$data, function($message) use($data){
            $message->from('info@connectbzmghs.com','BZMGHS');
            $message->to($data['email'],$data['name']);
            $message->bcc('bzmghs.alumni40@gmail.com','BZMGHS');
            $message->subject($data['subject']);
        });

        //send sms
        SMS::shoot('01789862904', 'Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS');


        Session::flash('contactMessage','Your message is successfully sent!');
        return redirect()->back();

    }

    public function Batch(Request $request){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['menu_categories'] = Product::select('category_id')->groupBy('category_id')->get()->take(6);
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['banner'] = Banner::where('id','1')->first();
        $data['six_category'] = Category::where('id','6')->first();
        $data['seven_category'] = Category::where('id','7')->first();
        $data['page_title'] = "home_title";


        if(request()->ajax()){
            if($request->batch)
            {
            $data['users'] = DB::table('users')->where('usertype','customer')->where('batch', $request->batch)->get();
            }
            else{
                $data['users'] = DB::table('users')->orderBy('member_id','desc')->where('usertype','customer')->get();
            }
             return datatables()->of($data['users'])->make(true);
        }

        return view('frontend.single_pages.batch',$data);

    }



}
