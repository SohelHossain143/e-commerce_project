<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use PDF;


class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    } 

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }  // end method

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }  // end method


    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }  // end method

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alter-type' => 'success'
        );


        return redirect()->back()->with($notification);
    } // end method



    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    } //  end method





      //adamin customer 

    public function admincustomerlist()
    {
        return view('admin.customer.admin_customer_list');
    }






      //admin product category 

    public function admincategorylist()
    {
        $categories = Category::all();
        return view('admin.category.admin_category_list', compact('categories'));
    }

    // public function admincategorystoer(Request $request)
    // {
    //     $validatedInput = $request->validate([
    //         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    //         'category_name' => 'requried|string|max:255',
    //     ]);

    //     if ($request->hasfile('photo')) {
    //         $photo = $request->file('photo');
    //         $photoName = date('YmdHi') . $photo->getClientsOriginlName();
    //         $photo->move(public_path('upload/admin_images')). $photoName;
    //         $validatedInput['photo'] = $photoName;
    //     }

    //     Category::create($validatedInput);

    //     $notification = array(
    //         'message' => 'Product Category added Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('admin.category.list')->with($notification);


    // }


    public function admincategorystoer(Request $request)
    {
            // Validate the input
        $validatedInput = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category_name' => 'required|string|max:255',  // Corrected 'requried' to 'required'
        ]);

               // Check if a photo file is uploaded
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
                 // Use the correct method to get the original file name
            $photoName = date('YmdHi') . $photo->getClientOriginalName();
                 // Correct concatenation and move file to the public directory
            $photo->move(public_path('upload/admin_images'), $photoName);
            $validatedInput['photo'] = $photoName;
        }

                 // Create the category with validated data
        Category::create($validatedInput);

                 // Set up a notification for the user
        $notification = array(
            'message' => 'Product Category added successfully',
            'alert-type' => 'success'
        );

               // Redirect with notification
        return redirect()->route('admin.category.list')->with($notification);
    }



    public function adminaddcategory()
    {
        return view('admin.category.admin_add_category');   
    }

    public function admineditcategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.admin_edit_category', compact('category'));   
    }


    public function adminupdatecategory(Request $request, $id)
    {
        $validatedInput = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category_name' => 'required|string|max:255',  // Corrected 'requried' to 'required'
        ]);

               // Check if a photo file is uploaded
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = date('YmdHi') . $photo->getClientOriginalName();
            $photo->move(public_path('upload/admin_images'), $photoName);
            $validatedInput['photo'] = $photoName;
        }

        $category = Category::findOrFail($id);
        $category->update($validatedInput);

                 // Set up a notification for the user
        $notification = array(
            'message' => 'Product Category update successfully',
            'alert-type' => 'success'
        );

               // Redirect with notification
        return redirect()->route('admin.category.list')->with($notification);
    }

     
    public function admindeletecategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.list')->with([
            'message' => 'Product Category update successfully',
            'alert-type' => 'success'
        ]);
    }






    //admin product 

    public function adminproductlist()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.product.admin_product_list', compact('products', 'categories'));
    }


    // public function adminproductstoer(Request $request)
    // {
    //     $validatedInput = $request->validate([
    //         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    //         'category_id' => 'requried|exists:categories,id',
    //         'name' => 'required|string|max:255',
    //         'price' => 'required|integer|min:0',
    //         'stock' => 'required|integer|min:0',
    //         'description' => 'required|string|max:255',
    //     ]);

    //     if ($request->hasfile('photo')) {
    //         $photo = $request->file('photo');
    //         $photoName = date('YmdHi') . $photo->getClientsOriginlName();
    //         $photo->move(public_path('upload/admin_images')). $photoName;
    //         $validatedInput['photo'] = $photoName;
    //     }

    //     Product::create($validatedInput);

    //     return redirect()->back()->with([
    //         'message' => 'Product Added Successfully',
    //         'alert-type' => 'success'
    //     ]);
    // }

    public function adminproductstoer(Request $request)
{
    $validatedInput = $request->validate([
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'category_id' => 'required|exists:categories,id', // Corrected 'requried' to 'required'
        'name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'required|string|max:255',
    ]);

    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photoName = date('YmdHi') . $photo->getClientOriginalName(); // Corrected 'getClientsOriginlName' to 'getClientOriginalName'
        $photo->move(public_path('upload/admin_images'), $photoName); // Fixed syntax for move function
        $validatedInput['photo'] = $photoName;
    }

    Product::create($validatedInput);

    return redirect()->back()->with([
        'message' => 'Product Added Successfully',
        'alert-type' => 'success'
    ]);
    }



    public function adminaddproduct()
    {

        $categories = Category::all();
        return view('admin.product.admin_add_product', compact('categories'));
    }

    

    // public function admineditproduct()
    // {
    //     $categories = Category::all();
    //     $product = Product::findOrFail($id);
    //     return view('admin.product.admin_edit_product', compact('product', 'categories'));
    // }

    public function admineditproduct($id)
    {
        // Fetch all categories
        $categories = Category::all();
    
        // Find the product by its ID
        $product = Product::findOrFail($id);
    
        // Return the view with product and categories data
        return view('admin.product.admin_edit_product', compact('product', 'categories'));
    }



    public function adminupdateproduct(Request $request, $id)
    {
        $validatedInput = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
        ]);

        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $photoName = date('YmdHi') . $photo->getClientsOriginlName();
            $photo->move(public_path('upload/admin_images')). $photoName;
            $validatedInput['photo'] = $photoName;
        }

        $product = Product::findOrFail($id);
        $product->update($validatedInput);

        return redirect()->back()->with([
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        ]);
    }


    public function admindeleteproduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.list')->with([
            'message' => 'Product delete Successfully',
            'alert-type' => 'success'
        ]);
    }


    public function adminviewproduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.admin_single_product', compact('product'));
    }
    


}