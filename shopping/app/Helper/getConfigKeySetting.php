<?php 
use App\Models\setting;
function getConfigKeySetting($configKey) {
    $setting = setting::where('config_key',$configKey)->first();
    if( !empty($setting) ) {
        return $setting->config_value;
    }
    return null;
    
    
}