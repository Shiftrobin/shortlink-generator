<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\MenuPermission;
use App\Models\Menu;

class MenuPermissionController extends Controller
{
     public function index(){
          if(Auth::user()->role=='admin'){
               $roles = Role::all();
               return view('backend.user.menu-permission', compact('roles'));
          }else{
               return back()->with('error','Sorry! you do not access this menu');
          }
     }

    public function menuPermissionList(Request $request){
          if(Auth::user()->role=='admin'){
               $role_id = $request->role_id;
               $roles = Role::all();
               $inarray = MenuPermission::select('menu_id')->where('role_id', $role_id)->get()->toArray();
               $parents = Menu::where('parent', 0)->where('status','1')->orderBy('sort', 'asc')->get();
               return view('backend.user.menu-permission', compact('parents','role_id','inarray','roles','role_id'));
          }else{
               return back()->with('error','Sorry! you do not access this menu');
          }

    }

    public function menuPermissionStore(Request $request){
       MenuPermission::where('role_id', $request->role_id)->delete();
       $checkmenu_id = $request->menu_id;
       if($checkmenu_id !=null){
            for ($i=0; $i <count($checkmenu_id) ; $i++) {
                $menupernission = new MenuPermission;
                $menupernission->menu_id = $request->menu_id[$i];
                $menupernission->role_id = $request->role_id;
                $menupernission->created_by = auth()->user()->id;
                $save = $menupernission->save();
            }
        }
        return redirect()->route('users.menu_permission')->with('success','Menu permitted successfully');
    }
}
