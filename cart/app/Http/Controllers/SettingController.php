<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\SettingAdminRequest;


class SettingController extends Controller
{
    use DeleteModelTrait;
    private $setting;
    public function __construct(setting $setting) {
        $this->setting = $setting;
    }
    public function index() {
        $setting = $this->setting->latest()->paginate(5);
        return view('admins.setting.index',compact('setting'));
    }
    public function create() {
        return view('admins.setting.add');
    }
    public function store(SettingAdminRequest $request) {
        $dataSetting = [
            'configure_key' => $request->configure_key,
            'configure_value' => $request->configure_value,
            'type' => $request->type

        ];
        $this->setting->create($dataSetting);
        return redirect()->route('setting.index');
    }
    public function edit($id){
        $settingEdit = $this->setting->find($id);
        return view('admins.setting.edit',compact('settingEdit'));
    }
    public function update(Request $request,$id) {
        $dataUpdate = [
            'configure_key' => $request->configure_key,
            'configure_value' => $request->configure_value,

        ];
        $this->setting->find($id)->update($dataUpdate);
        return redirect()->route('setting.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id,$this->setting);
    }
}
