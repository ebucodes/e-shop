<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $pageTitle = 'Admin Dashboard';
        $logs = Activity::orderBy('created_at', 'DESC')->get();
        return view('admin.dashboard', compact('pageTitle', 'logs'));
    }


    //
    public function categoryIndex()
    {
        $pageTitle = 'Category';
        $collection = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.category', compact('pageTitle', 'collection'));
    }

    //
    public function categoryStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'bail|required',
            'desc' => 'bail|required',
        ]);

        if ($validated) {
            $create = new Category();
            $create->name = $request->name;
            $create->desc = $request->desc;
            $create->status = 'active';
            $create->save();
            // log activity
            $logMessage = auth()->user()->email . " created a new category named: {$request->name}";
            logAction(auth()->user()->email, 'Created a Category', $logMessage, $request->ip(), $request->userAgent());
            //
            return redirect()->back()->with('success', "Created successfully");
        } else {
            // If there are validation errors, you can return to the form with the errors
            return back()->withErrors($validated);
        }
    }

    //
    public function categoryUpdate(Request $request)
    {
        $id = $request->id;

        $validated = $request->validate([
            'name' => 'bail|required',
            'desc' => 'bail|required',
        ]);

        if ($validated) {
            $category = Category::find($id);
            $category->update(['name' => $request->name, 'desc' => $request->desc, 'status' => $request->status]);
            // log activity
            $logMessage = auth()->user()->email . " updated a category";
            logAction(auth()->user()->email, 'Updated a Category', $logMessage, $request->ip(), $request->userAgent());
            //
            return redirect()->back()->with('success', "Updated successfully");
        } else {
            // If there are validation errors, you can return to the form with the errors
            return back()->withErrors($validated);
        }
    }

    //
    public function categoryDelete(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $category->delete();
        // log activity
        $logMessage = auth()->user()->email . " deleted a category";
        logAction(auth()->user()->email, 'Deleted a Category', $logMessage, $request->ip(), $request->userAgent());
        //
        return redirect()->back()->with('success', "Deleted successfully");
    }

    //
    public function subCategoryIndex()
    {
        $pageTitle = 'Sub Category';
        $collection = SubCategory::orderBy('created_at', 'DESC')->get();
        $categories = Category::get();
        return view('admin.sub-category', compact('pageTitle', 'collection', 'categories'));
    }

    //
    public function subCategoryStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'bail|required',
            'desc' => 'bail|required',
            'category' => 'bail|required'
        ]);

        if ($validated) {
            $create = new SubCategory();
            $create->name = $request->name;
            $create->desc = $request->desc;
            $create->category = json_encode($request->category);
            $create->status = 'active';
            $create->save();
            // log activity
            $logMessage = auth()->user()->email . " created a new sub-category named: {$request->name}";
            logAction(auth()->user()->email, 'Created a Sub-Category', $logMessage, $request->ip(), $request->userAgent());
            //
            return redirect()->back()->with('success', "Created successfully");
        } else {
            // If there are validation errors, you can return to the form with the errors
            return back()->withErrors($validated);
        }
        return view('admin.dashboard', compact('pageTitle'));
    }

    //
    public function subCategoryUpdate()
    {
        $pageTitle = 'Category';
        return view('admin.dashboard', compact('pageTitle'));
    }

    //
    public function subCategoryDelete()
    {
        $pageTitle = 'Category';
        return view('admin.dashboard', compact('pageTitle'));
    }
    //
    public function blogIndex()
    {
        $pageTitle = 'Blog';
        return view('admin.dashboard', compact('pageTitle'));
    }

    //
    public function blogStore()
    {
        $pageTitle = 'Category';
        return view('admin.dashboard', compact('pageTitle'));
    }

    //
    public function blogUpdate()
    {
        $pageTitle = 'Category';
        return view('admin.dashboard', compact('pageTitle'));
    }

    //
    public function blogDelete()
    {
        $pageTitle = 'Category';
        return view('admin.dashboard', compact('pageTitle'));
    }

    //
    public function adminIndex()
    {
        $pageTitle = 'Category';
        return view('admin.dashboard', compact('pageTitle'));
    }

    //
    public function adminStore()
    {
        $pageTitle = 'Category';
        return view('admin.dashboard', compact('pageTitle'));
    }

    //
    public function adminUpdate()
    {
        $pageTitle = 'Category';
        return view('admin.dashboard', compact('pageTitle'));
    }

    //
    public function adminDelete()
    {
        $pageTitle = 'Category';
        return view('admin.dashboard', compact('pageTitle'));
    }
}
