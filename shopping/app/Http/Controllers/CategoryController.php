<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Components\CategoryRecusive;
use Str;

class CategoryController extends Controller
{
    protected $category;
    protected $htmlOption;
    protected $CategoryRecusive;

    public function __construct(category $category) {
        $this->category = $category;
    }
    public function index() {
        dd(bcrypt('matkhau'));
        // $categories = $this->category->paginate(6);
        // return view('admins.category.index',compact('categories'));
    }
    public function create() {
        $categories = $this->category->all();
        $category = new CategoryRecusive($categories);

        $htmlOptions = $category->RecusiveCategory($parentID = '');
        return view('admins.category.add',compact('htmlOptions'));
    }
    public function store(Request $request) {
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ];
        $this->category->create($data);
        return redirect()->route('category.index');
    }
    public function edit($id) {
        $category = $this->category::find($id);
        $categories = $this->category->all();
        $instanCategory = new CategoryRecusive($categories);
        $htmlOptions = $instanCategory->RecusiveCategory($category->parent_id);
         
        return view('admins.category.edit',compact('category','htmlOptions'));
    }
    public function update(Request $request,$id) {
        $category = $this->category::find($id);

        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ];
        $category->update($data);
        return redirect()->route('category.index');
    }
    public function delete($id) {
        
        $this->category->find($id)->delete();
        return response()->json([
            'message' => 'success',
            'code' => '200'
        ]);
    }
}
