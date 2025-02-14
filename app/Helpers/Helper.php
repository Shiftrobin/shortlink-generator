<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Helper {

    public static function makeSlug($str) {

        return Str::slug($str);

    }

    public static function getVendorCoordinates($vendorId){
        $data = DB::table('users')->select('store_lat_lng')->where('id', $vendorId )->get();
        return $data[0]->store_lat_lng;
    }

}
