<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $product,$image,$imageName,$imageDirectory,$imageUrl;

    public static function saveProduct($request)
    {
        if ($request->product_id){
            self::$product = Product::find($request->product_id);
        }
        else{
            self::$product = new Product();
        }

        self::$product->product_name = $request->product_name;
        self::$product->category_name = $request->category_name;
        self::$product->brand_name = $request->brand_name;
        self::$product->price = $request->price;
        self::$product->description = $request->description;
        if($request->image){
            if(file_exists(self::$product->image)){
                unlink(self::$product->image);
            }
            self::$product->image = self::getImgUrl($request);
        }

        self::$product->save();
    }

    private static function getImgUrl($request){
        self::$image= $request->file('image');
        self::$imageName = 'product-'.rand().'.'.self::$image->Extension();
        self::$imageDirectory = 'admin-assets/product-image/';
        self::$imageUrl= self::$imageDirectory.self::$imageName;
        self::$image->move(self::$imageDirectory,self::$imageName);
        return self::$imageUrl;
    }
    public static function statusProduct($id){
        self::$product= Product::find($id);
        if(self::$product->status==1){
            self::$product->status = 0;
        }
        else{
            self::$product->status = 1;
        }
        self::$product->save();
    }
}
