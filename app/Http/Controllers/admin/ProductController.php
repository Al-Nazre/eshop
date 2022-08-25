<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use File;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact ('products'));
    }


    function add()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    function insert(Request $request)
    {
        $product = new Product;

        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }

        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->small_descrip = $request->input('small_descrip');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == True? '1':'0';
        $product->trending = $request->input('trending') == True? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_descrip = $request->input('meta_descrip');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->save();
        return redirect('/products')->with('status','Product Added Successfully!');

    }

    function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit', compact('product',  'category'));
    }

    function update(Request $request, $id)
    {
      $product = Product::find($id);

        if ($request->hasfile('image'))
        {
            $path = 'assets/uploads/product/'.$product->image;
            if(file::exists($path))
            {
                file::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }

        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->small_descrip = $request->input('small_descrip');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == True? '1':'0';
        $product->trending = $request->input('trending') == True? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_descrip = $request->input('meta_descrip');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->update();
        return redirect('products')->with('status','Product Updated Successfully!');
    }

    function delete($id)
    {
        $product = Product::find($id);
        $path = 'assets/uploads/product/'.$product->image;
        if(file::exists($path))
        {
            file::delete($path);
        }
        $product->delete();
        return redirect ('/products')->with('status','Product Deleted Successfully!');
    }
}
