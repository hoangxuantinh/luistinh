<?php

namespace App\Http\Controllers;
use App\Models\setting;

use Illuminate\Http\Request;
use App\Traits\deleteModeTrait;


class SettingController extends Controller
{
    private $setting;
    use deleteModeTrait;
    public function __construct(setting $setting) {
        $this->setting = $setting;
    }
    public function index() {
        $settings = setting::paginate(5);
        return view('admins.setting.index',compact('settings'));

    }
    public function create() {
        return view('admins.setting.add');
    }
    public function store(Request $request) {
        $data = [
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ];
        setting::create($data);
        return redirect()->route('setting.index');
    }
    public function edit($id){
        $setting = setting::find($id);
        return view('admins.setting.edit',compact('setting'));
    }
    public function update($id,Request $request) {
        $setting = setting::find($id);
        $data = [
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ];
        $setting->update($data);
        return redirect()->route('setting.index');
    }
    public function delete($id) {
        return $this->deleteModeTrait($id,$this->setting);

    }
}
