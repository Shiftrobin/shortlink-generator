<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\FaqCategory;
use App\Models\Faq;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;
use App\Models\Promotion;
use App\Models\Offer;
use App\Models\Banner;
use Image;

class SiteSettingController extends Controller
{
    public function faqCategoryView(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = FaqCategory::all();
            return view('backend.site_setting.faq.faq_category_view',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function faqCategoryadd(){
        if(Auth::user()->role=='admin'){
            return view('backend.site_setting.faq.faq_category_add');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function faqCategoryStore(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:faq_categories,name'
        ]);
        $data = new FaqCategory();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('site-setting.faq.category.view')->with('success','Data Inserted successfully');
    }

    public function faqCategoryEdit($id){
        if(Auth::user()->role=='admin'){
            $data['editData'] = FaqCategory::find($id);
            return view('backend.site_setting.faq.faq_category_add',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function faqCategoryUpdate(Request $request,$id){
        $data = FaqCategory::find($id);
        $this->validate($request,[
            'name'      => 'required|unique:faq_categories,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('site-setting.faq.category.view')->with('success','Data updated successfully');
    }

    public function faqCategoryDelete(Request $request){
        $data = FaqCategory::find($request->id);
        $data->delete();
        return redirect()->route('site-setting.faq.category.view')->with('success','Data Deleted successfully');
    }

    //FAQ
    public function faqView(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = Faq::all();
            return view('backend.site_setting.faq.faq_view',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function faqadd(){
        if(Auth::user()->role=='admin'){
            $data['faq_categories'] = FaqCategory::all();
            return view('backend.site_setting.faq.faq_add',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function faqStore(Request $request){
        $data = new Faq();
        $data->faq_category_id = $request->faq_category_id;
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('site-setting.faq.view')->with('success','Data Inserted successfully');
    }

    public function faqEdit($id){
        if(Auth::user()->role=='admin'){
            $data['editData'] = Faq::find($id);
            $data['faq_categories'] = FaqCategory::all();
            return view('backend.site_setting.faq.faq_add',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function faqUpdate(Request $request,$id){
        $data = Faq::find($id);
        $data->faq_category_id = $request->faq_category_id;
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('site-setting.faq.view')->with('success','Data updated successfully');
    }

    public function faqDelete(Request $request){
        $data = Faq::find($request->id);
        $data->delete();
        return redirect()->route('site-setting.faq.view')->with('success','Data Deleted successfully');
    }

    // Privacy Policy

    public function policyView(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = PrivacyPolicy::all();
            $data['count'] = PrivacyPolicy::count();
            return view('backend.site_setting.privacy.privacy_view',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function policyadd(){
        if(Auth::user()->role=='admin'){
            return view('backend.site_setting.privacy.privacy_add');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function policyStore(Request $request){
        $data = new PrivacyPolicy();
        $data->description = $request->description;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('site-setting.privacy-policy.view')->with('success','Data Inserted successfully');
    }

    public function policyEdit($id){
        if(Auth::user()->role=='admin'){
            $data['editData'] = PrivacyPolicy::find($id);
            return view('backend.site_setting.privacy.privacy_add',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function policyUpdate(Request $request,$id){
        $data = PrivacyPolicy::find($id);
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('site-setting.privacy-policy.view')->with('success','Data updated successfully');
    }

    public function policyDelete(Request $request){
        $data = PrivacyPolicy::find($request->id);
        $data->delete();
        return redirect()->route('site-setting.privacy-policy.view')->with('success','Data Deleted successfully');
    }

    // Term & Condition

    public function termsView(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = TermCondition::all();
            $data['count'] = TermCondition::count();
            return view('backend.site_setting.terms.terms_view',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function termsadd(){
        if(Auth::user()->role=='admin'){
            return view('backend.site_setting.terms.terms_add');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function termsStore(Request $request){
        $data = new TermCondition();
        $data->description = $request->description;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('site-setting.terms-condition.view')->with('success','Data Inserted successfully');
    }

    public function termsEdit($id){
        if(Auth::user()->role=='admin'){
            $data['editData'] = TermCondition::find($id);
            return view('backend.site_setting.terms.terms_add',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function termsUpdate(Request $request,$id){
        $data = TermCondition::find($id);
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('site-setting.terms-condition.view')->with('success','Data updated successfully');
    }

    public function termsDelete(Request $request){
        $data = TermCondition::find($request->id);
        $data->delete();
        return redirect()->route('site-setting.terms-condition.view')->with('success','Data Deleted successfully');
    }

    // Prmotion

    public function promotionView(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = Promotion::all();
            $data['count'] = Promotion::count();
            return view('backend.site_setting.promotion.promotion_view',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function promotionadd(){
        if(Auth::user()->role=='admin'){
            return view('backend.site_setting.promotion.promotion_add');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function promotionStore(Request $request){
        $data = new Promotion();
        $data->title = $request->title;
        $data->link = $request->link;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('site-setting.promotion.view')->with('success','Data Inserted successfully');
    }

    public function promotionEdit($id){
        if(Auth::user()->role=='admin'){
            $data['editData'] = Promotion::find($id);
            return view('backend.site_setting.promotion.promotion_add',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function promotionUpdate(Request $request,$id){
        $data = Promotion::find($id);
        $data->title = $request->title;
        $data->link = $request->link;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('site-setting.promotion.view')->with('success','Data updated successfully');
    }

    public function promotionDelete(Request $request){
        $data = Promotion::find($request->id);
        $data->delete();
        return redirect()->route('site-setting.promotion.view')->with('success','Data Deleted successfully');
    }

    // Offer

    public function offerView(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = Offer::all();
            $data['count'] = Offer::count();
            return view('backend.site_setting.offer.offer_view',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function offeradd(){
        if(Auth::user()->role=='admin'){
            return view('backend.site_setting.offer.offer_add');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function offerStore(Request $request){
        $data = new Offer();
        $data->title = $request->title;
        $data->link = $request->link;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/offer_images'), $filename);
            $file = Image::make(public_path('upload/offer_images/').$filename);
            $file->resize(285,230)->save(public_path('upload/offer_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('site-setting.offer.view')->with('success','Data Inserted successfully');
    }

    public function offerEdit($id){
        if(Auth::user()->role=='admin'){
            $data['editData'] = Offer::find($id);
            return view('backend.site_setting.offer.offer_add',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function offerUpdate(Request $request,$id){
        $data = Offer::find($id);
        $data->title = $request->title;
        $data->link = $request->link;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/offer_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/offer_images'), $filename);
            $file = Image::make(public_path('upload/offer_images/').$filename);
            $file->resize(285,230)->save(public_path('upload/offer_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('site-setting.offer.view')->with('success','Data updated successfully');
    }

    public function offerDelete(Request $request){
        $data = Offer::find($request->id);
        if (file_exists('public/upload/offer_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/offer_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('site-setting.offer.view')->with('success','Data Deleted successfully');
    }

    // Banner

    public function bannerView(){
        if(Auth::user()->role=='admin'){
            $data['allData'] = Banner::all();
            return view('backend.site_setting.banner.banner_view',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function banneradd(){
        if(Auth::user()->role=='admin'){
            return view('backend.site_setting.banner.banner_add');
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function bannerStore(Request $request){
        $data = new Banner();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/banner_images'), $filename);
            $file = Image::make(public_path('upload/banner_images/').$filename);
            $file->resize(1920,550)->save(public_path('upload/banner_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('banners.banner.view')->with('success','Data Inserted successfully');
    }

    public function bannerEdit($id){
        if(Auth::user()->role=='admin'){
            $data['editData'] = Banner::find($id);
            return view('backend.site_setting.banner.banner_add',$data);
        }else{
            return back()->with('error','Sorry! you do not access this menu');
        }
    }

    public function bannerUpdate(Request $request,$id){
        $data = Banner::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/banner_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/banner_images'), $filename);
            $file = Image::make(public_path('upload/banner_images/').$filename);
            $file->resize(1920,550)->save(public_path('upload/banner_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('banners.banner.view')->with('success','Data updated successfully');
    }

    public function bannerDelete(Request $request){
        $data = Banner::find($request->id);
        if (file_exists('public/upload/banner_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/banner_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('banners.banner.view')->with('success','Data Deleted successfully');
    }
}
