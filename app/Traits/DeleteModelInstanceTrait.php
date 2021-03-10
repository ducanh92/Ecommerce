<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait DeleteModelInstanceTrait
{
    public function deleteInstance($modelInstance)
    {
        try {
            $modelInstance->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success!'
            ], 200);
        }
        catch (\Exception $exception) {
            Log::error( 'Message: ' . $exception->getMessage() . '.' . ' Line: ' . $exception->getLine() );
            return response()->json([
                'code' => 500,
                'message' => 'Delete failed!'
            ], 500);
        }
    }

}
