<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    public static function store(){
        $store = DB::table('stores')->get();
        return $store;
    }

    public static function storeMenu($id){
        $storesMenu = DB::table('store_menus')
        ->where('store_menus.store_id', $id)->get();
        return $storesMenu;
    }

    public static function storeId($id){
        $storeId = (array) DB::table('stores')->find($id);
        return $storeId;
    }

    public static function storeName($name){
        $storeName = DB::table('stores')->where('name',"like","%".$name."%")->get();
        return $storeName;
    }   

    public static function insertStore($requestContainer){  
        return DB::table('stores')->insertGetId($requestContainer);

    }

    public static function updateStore($request){
        return DB::table('stores')->where('id',$request)->update($request);
    }
    
    public static function deleteStore($request){
        return DB::table('stores')->where('id',$request)->delete($request);
    }
    
    
    // public static function insertStore($requestInsert){

    //     return DB::table('stores')->updateOrInsert->where('id',$requestInsert)->update($requestInsert);
    // }
}
