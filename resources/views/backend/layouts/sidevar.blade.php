@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

    $parentroutearray = explode('.',$route);
    $parentroute = $parentroutearray['0'];
    $user_role = Auth::user()->role_id;
    $nav_menu = [];
@endphp
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <?php
        $parent_menu = App\Models\Menu::where('parent', 0)->where('status',1)->orderBy('sort', 'asc')->get();
        foreach ($parent_menu as $parent) {
            $permission = App\Models\MenuPermission::orderBy('menu_id', 'asc')->where([['role_id', $user_role],['menu_id', $parent->id]])->get();
            foreach($permission as $p){
                if($p->menu_id==$parent->id){
                    $child_menu = App\Models\Menu::where('parent', $parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
                    if(count($child_menu) > '0'){
                        ?>
                        <li class="nav-item has-treeview {{($prefix == '/'.$parent->url)? 'menu-open':''}}">
                          <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy {{($parent->icon)?($parent->icon):''}}"></i>
                            <p>
                              {{ $parent->menu_name }}
                              <i class="fas fa-angle-left right"></i>
                            </p>
                          </a>
                            <ul class="nav nav-treeview">
                                <?php
                                foreach ($child_menu as $child) {
                                    $permission=App\Models\MenuPermission::orderBy('menu_id', 'asc')->where([['role_id', $user_role],['menu_id', $child->id]])->get();
                                    foreach($permission as $p){
                                        if($p->menu_id==$child->id){
                                            ?>
                                            <li class="nav-item">
                                              <a href="{{ route($child->url) }}" class="nav-link {{($route ==$child->url)? 'active':''}}">
                                                <i class="far fa-circle nav-icon {{($route ==$child->url)? 'text-success':''}}"></i>
                                                <p>{{ $child->menu_name }}</p>
                                              </a>
                                            </li>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li class="nav-item has-treeview {{($prefix == '/'.$parent->url)? 'menu-open':''}}">
                          <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy {{($parent->icon)?($parent->icon):''}}"></i>
                            <p>
                              {{ $parent->menu_name }}
                              <i class="fas fa-angle-left right"></i>
                            </p>
                          </a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                }
            }
        }
    ?>

  </ul>
</nav>
