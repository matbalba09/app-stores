<?php

namespace App\Http\Controllers;

use App\Models\StoreMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StoreMenuController extends Controller
{
    public function viewMenu(){
        return StoreMenu::storeMenu();
    }

    public function viewMenuJoin(){
        return StoreMenu::storeMenuJoin();
    }

    public function viewMenuJoinJson(){
        $storeMenuDataJoin = StoreMenu::storeMenuJoin();
        $storeMenuData = StoreMenu::storeMenu();

        if(count($storeMenuData) > 0){
            return response()->json(array(
            'store_menujoin' => $storeMenuDataJoin,
            'store_menu' => $storeMenuData )
            , 200);
        }else{
            return response()->json(array(
                'message' => 'Please Try Again.'
            ), 400);
        }
    }

    public function viewMenuId($id){
        $storeMenuData = StoreMenu::storeMenuId($id);
        if(count($storeMenuData) > 0){
            return response()->json($storeMenuData, 200);
        }else{
            return response()->json(array(
                'message' => 'Menu not found.'
            ), 404);
        }
    }

    public function viewMenuIdJoin($id){
        $storeMenuData = StoreMenu::storeMenuIdJoin($id);
        if(count($storeMenuData) > 0){
            return response()->json($storeMenuData, 200);
        }else{
            return response()->json(array(
                'message' => 'Menu not found.'
            ), 404);
        }
    }

    public function viewMenuName($name){
        $storeMenuData = StoreMenu::storeMenuName($name);
        if(count($storeMenuData) > 0){
            return response()->json($storeMenuData, 200);
        }else{
            return response()->json(array(
                'message' => 'Menu not found.'
            ), 404);
        }
    }

    public function viewMenuNameJoin($name){
        $storeMenuData = StoreMenu::storeMenuNameJoin($name);
        if(count($storeMenuData) > 0){
            return response()->json($storeMenuData, 200);
        }else{
            return response()->json(array(
                'message' => 'Menu not found.'
            ), 404);
        }
    }

    public function insertStoreMenu(Request $request){
        

        $requestContainer = array (
            
            'menu_name' => $request->menu_name,
            'price' => $request->price,
            'created_at' =>Carbon::now()->format('Y-m-d H-i-s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H-i-s')
        );
        
        $insertStoreMenu = StoreMenu::insertStoreMenu($requestContainer);
        $storeMenuData = StoreMenu::storeMenuId($insertStoreMenu);

        if(count($storeMenuData) > 0){
            
            // return response()->json(array(
            //     'message' => 'Success.'
            // ), 200);

            return response()->json( $storeMenuData, 200);
        }else{
            return response()->json(array(
                'message' => 'Please Try Again.'
            ), 400);
        }       
    }

    public function updateStoreMenu(Request $request){       
        $requestContainer = array (
            
            'id' => $request->id,
            'menu_name' => $request->menu_name,
            'price' => $request->price,
            'created_at' =>Carbon::now()->format('Y-m-d H-i-s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H-i-s')
        );
        
        $storeMenuData = StoreMenu::updateStoreMenu($requestContainer);
        if(count($storeMenuData) > 0){
            return response()->json(array(
                'message' => 'Success.'
            ), 200);
        }else{
            return response()->json(array(
                'message' => 'Please Try Again.'
            ), 400);
        }       
    }

    public function deleteStoreMenu(Request $request){

        $requestContainer = array (
            'id' => $request->id,
        );

        $deleteStoreMenu = StoreMenu::deleteStoreMenu($requestContainer);
        if($deleteStoreMenu){
            return response()->json(array(
                'message' => 'Success.'
            ), 200);
        }else{
            return response()->json(array(
                'message' => 'Please Try Again.'
            ), 400);
        }
    }

    //
}
