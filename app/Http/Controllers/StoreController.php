<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\StoreMenu;

class StoreController extends Controller
{

    public function view(){
        return Store::store();
    }
    //test

    public function viewStoreMenu(){
        $storesData = Store::store();
               
        if(count($storesData) > 0){
            
            $storesArray = [];

            foreach($storesData as $storeData){
                $storeId = $storeData->id;
                $storesMenuData = Store::storeMenu($storeId);

                $storeDataArray = array(
                    'id' => $storeId,
                    'name' => $storeData->name,
                    'menus' => $storesMenuData
                );
                $storesArray[] = $storeDataArray;
            }
            // print_r($storesArray);

            return response()->json(array (
            'stores' => $storesArray
            ),200);

        }else{
            return response()->json(array(
                'message' => 'Nothing to see here.'
            ), 400);
        }
    }
    
    public function viewId($id){
        $storeData = Store::storeId($id);
        if($storeData){
            return response()->json($storeData, 200);
        }else{
            return response()->json(array(
                'message' => 'Store not found.'
            ), 404);
        }
    }

    public function viewStoreMenuId($id){
        $storesData = Store::storeId($id);

        if(count($storesData) > 0){
            
            $storesArray = [];

            foreach($storesData as $storeData){
                $storeId = $storeData->id;
                $storesMenuData = Store::storeMenu($storeId);

                $storeDataArray = array(
                    'id' => $storeId,
                    'name' => $storeData->name,
                    'menus' => $storesMenuData
                );
                $storesArray[] = $storeDataArray;
            }
            // print_r($storesArray);

            return response()->json(array (
            'stores' => $storesArray
            ),200);

        }else{
            return response()->json(array(
                'message' => 'Nothing to see here.'
            ), 400);
        }
    }

    public function viewName($name){
        // return Store::storeName($name);

        $storeData = Store::storeName($name);
        if($storeData){
            return response()->json($storeData, 200);
        }else{
            return response()->json(array(
                'message' => 'Store not found.'
            ), 404);
        }
    }
    
    public function insertStore(Request $request){
        
        $requestContainer = array (
            
            // 'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'created_at' => Carbon::now()->format('Y-m-d H-i-s'),
            'updated_at' => Carbon::now()->format('Y-m-d H-i-s')
        );
        
        $insertStore = Store::insertStore($requestContainer);
        $storeData = Store::storeId($insertStore);
        
        if($storeData){
            // return response()->json(array(
            //     // 'message' => 'Success.'
            // ), 200);
            
            return response()->json( $storeData, 200);
        }else{
            return response()->json(array(
                'message' => 'Please Try Again.'
            ), 400);
        }       
    }

    public function updateStore(Request $request){

        $requestContainer = array (
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'created_at' =>Carbon::now()->format('Y-m-d H-i-s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H-i-s')
        );

        $updateStore = Store::updateStore($requestContainer);
        if($updateStore){
            return response()->json(array(
                'message' => 'Success.'
            ), 200);
        }else{
            return response()->json(array(
                'message' => 'Please Try Again.'
            ), 400);
        }

    }

    public function deleteStore(Request $request){

        $requestContainer = array (
            'id' => $request->id,
        );

        $deleteStore = Store::deleteStore($requestContainer);
        if($deleteStore){
            return response()->json(array(
                'message' => 'Success.'
            ), 200);
        }else{
            return response()->json(array(
                'message' => 'Please Try Again.'
            ), 400);
        }
    }

    // public function ($name){
    //     return Store::storeName($name);
    // }

}
