<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class AdminController extends Controller
{
   public function index()
   {
      return view('admin.dashboard');
   }
   public function showAddUserForm()
   {
        return view('admin.adduser');
   }

   // public function customerList()
   // {
   //    $customers = User::where('role', 3)->get();
   //    return view('admin.customer.list', compact('customers'));
   // }
   public function customerList(Request $request)
   {
       $search = $request->input('search');
       $customers = User::where('role', 3)
           ->when($search, function ($query, $search) {
               return $query->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('phone', 'like', "%{$search}%");
           })
           ->paginate(10);
   
       return view('admin.customer.list', compact('customers', 'search'));
   }
   

    public function editCustomer($id)
    {
        $customer = User::find($id);
       
            return view('admin.customer.edit',compact('customer'));
           
        
    }

    public function updateCustomer(Request $request, $id)
    {
      $customer = User::findOrFail($id);
  
      $customer->update($request->all());

       return redirect()->route('customer.list')->with('success', 'Customer updated successfully');
    }

    public function destroyCustomer($id)
    {
      $customer = User::findOrFail($id);
      $customer->delete();
      return redirect()->route('customer.list')->with('success', 'Customer deleted successfully.');
   }

   


   // Manager method

   public function managerList(Request $request)
   {
       $search = $request->input('search');
       $managers = User::where('role', 4)
           ->when($search, function ($query, $search) {
               return $query->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('phone', 'like', "%{$search}%");
           })
           ->paginate(10);
   
       return view('admin.manager.list', compact('managers', 'search'));
   }
   

    public function editManager($id)
    {
        $manager = User::find($id);
       
            return view('admin.manager.edit',compact('manager'));
           
        
    }

    public function updateManager(Request $request, $id)
    {
      $manager = User::findOrFail($id);
  
      $manager->update($request->all());

       return redirect()->route('manager.list')->with('success', 'Manager updated successfully');
    }

    public function destroyManager($id)
    {
      $manager = User::findOrFail($id);
      $manager->delete();
      return redirect()->route('manager.list')->with('success', 'Manager deleted successfully.');
   }
   
   /// Shop owner method

   public function shopOwnerList(Request $request)
   {
       $search = $request->input('search');
       $shopowners = User::where('role', 2)
           ->when($search, function ($query, $search) {
               return $query->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('phone', 'like', "%{$search}%");
           })
           ->paginate(10);
   
       return view('admin.shopowner.list', compact('shopowners', 'search'));
   }
   

    public function editShopOwner($id)
    {
        $shopowner = User::find($id);
       
            return view('admin.shopowner.edit',compact('shopowner'));
           
        
    }

    public function updateShopOwner(Request $request, $id)
    {
      $shopowner = User::findOrFail($id);
  
      $shopowner->update($request->all());

       return redirect()->route('shop.owner.list')->with('success', 'Shop owner updated successfully');
    }

    public function destroyShopOwner($id)
    {
      $shopowner = User::findOrFail($id);
      $shopowner->delete();
      return redirect()->route('shop.owner.list')->with('success', 'Shop owner deleted successfully.');
   }
   

}
