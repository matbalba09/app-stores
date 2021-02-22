<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreMenu extends Model
{
    use HasFactory;
    
    public static function storeMenu(){
        $storeMenu = DB::table('store_menus')->get();       
        return $storeMenu;
    }

    public static function storeMenuJoin(){
        $storeMenuJoin = DB::table('store_menus')
        ->join('stores', 'store_menus.store_id', '=', 'stores.id')
        ->select('store_menus.*', 'stores.name','stores.email','stores.address', 
            'store_menus.id AS menu_id','store_menus.created_at AS menu_created_at',
            'store_menus.updated_at AS menu_updated_at', 'stores.created_at AS store_created_at', 
            'stores.updated_at AS store_updated_at')
        ->get();
        return $storeMenuJoin;
    }

    public static function storeMenuId($id){
        $storeMenuId = (array) DB::table('store_menus')->find($id);
        return $storeMenuId;
    }

    public static function storeMenuIdJoin($id){
        $storeMenuIdJoin = DB::table('store_menus')
        ->join('stores', 'store_menus.store_id', '=', 'stores.id')
        ->select('store_menus.*', 'stores.name','stores.email','stores.address', 
            'store_menus.id AS menu_id','store_menus.created_at AS menu_created_at',
            'store_menus.updated_at AS menu_updated_at', 'stores.created_at AS store_created_at', 
            'stores.updated_at AS store_updated_at')
        ->where('store_menus.id', $id)->get();
        return $storeMenuIdJoin;
    }

    public static function storeMenuName($name){
        $storeMenuName = DB::table('store_menus')->where('menu_name',"like","%".$name."%")->get();
        return $storeMenuName;
    }

    public static function storeMenuNameJoin($name){
        $storeMenuNameJoin = DB::table('store_menus')
        ->join('stores', 'store_menus.store_id', '=', 'stores.id')
        ->select('store_menus.*', 'stores.name','stores.email','stores.address',
            'stores.name','stores.email','stores.address', 
            'store_menus.id AS menu_id','store_menus.created_at AS menu_created_at',
            'store_menus.updated_at AS menu_updated_at', 'stores.created_at AS store_created_at', 
            'stores.updated_at AS store_updated_at')
        ->where('menu_name',"like","%".$name."%")->get();
        return $storeMenuNameJoin;
    }

    public static function insertStoreMenu($request){  
        return DB::table('store_menus')->insertGetId($request);
    }

    public static function updateStoreMenu($request){
        return DB::table('store_menus')->where('id',$request)->update($request);
    }

    public static function deleteStoreMenu($request){
        return DB::table('store_menus')->where('id',$request)->delete($request);
    }
}
