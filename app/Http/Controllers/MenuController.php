<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu/index', [
            'menu' => Menu::latest()->get()]);
    }
    public function filterByCategory(Request $request)
    {
        $option = $request->category;
        return view('menu/index', [
            'menu' => Menu::where('category', 'LIKE', $option)->get()]);
    }
    public function filterByPrice(Request $request)
    {
        $option = $request->price;

        return view('menu/index', [
            'menu' => Menu::where('price', '<=', $option)->get()]);
    }
    public function searchByDishName(Request $request)
    {
        return view('menu/index', [
            'menu' => Menu::where('dish_name', 'LIKE', '%'.$request->searchTerm .'%')->get()]);
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/menu_images',$imageName);
        }

        $this->validateMenuItem();
        $item = new Menu(request(['dish_name', 'description', 'allergy','price','category']));
        $item->image = $imageName;
        $item->save();

        //Menu::create();
        return redirect()->route('menu.index');
    }

    public function show(Menu $menuItem)
    {
        return view('menu.show', compact('menuItem'));
    }

    public function edit(Menu $menuItem)
    {
        return view('menu.update', compact('menuItem'));
    }

    public function update(Menu $menuItem)
    {

        $menuItem->update($this->validateMenuItem());
        return redirect()->route('menu.index');
    }

    public function destroy(Menu $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu.index');
    }

    protected function validateMenuItem()
    {
        return request()->validate([
            'dish_name' => ['required', 'max:200'],
            'description' => ['required'],
            'allergy' => ['required'],
            'price' => ['required', 'max:5', 'min:4'],
            'category' =>[],
            'image'  => ['image','nullable','max:1999']
        ]);
    }

}

