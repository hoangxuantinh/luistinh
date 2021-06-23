<?php 
namespace App\Traits;
trait deleteModeTrait {
    public function deleteModeTrait($id,$model) {
        try{
            $model->find($id)->delete();
            return response()->json([
                'message' => 'success',
                'code'=> 200
            ]);

        }catch(\Exception $exception) {
            return response()->json([
                'message' => 'fail',
                'code'=> 500
            ]);
            Log::error('Message: ' .$exception->getMessage() . '----Line:   ' . $exception->getLine());


        }
    }
}