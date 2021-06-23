<?php 
namespace App\Components;
use App\Models\category;
class CategoryRecusive{
    public $htmlOption = '';
    public $data = null;
    public function __construct($data) {
        $this->data = $data;
    }
    public function RecusiveCategory($parentId,$id = 0, $text = '') {
        foreach($this->data as $dataItem){
            if( $dataItem['parent_id'] == $id ){
                if( !empty($parentId) && $parentId === $dataItem['id']) {
                    $this->htmlOption .= "<option selected value='" . $dataItem['id'] . "'>" .$text . $dataItem->name. "</option>";
                }else{
                    $this->htmlOption .= "<option value='" . $dataItem['id'] . "'>" .$text . $dataItem->name. "</option>";

                }

                $this->RecusiveCategory($parentId,$dataItem->id,$text . '--');
                
            }
                        
        }
        return $this->htmlOption;
    }
}