<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

trait ExceptionTrait 
{
    public function apiException($request, $e)
    {
        
        
        if($this->isModel($e))
        {
            return response()->json([
                'errors' => 'Product Model Not found'
            ], Response::HTTP_NOT_FOUND);
        } 
        
        if($this->isHttp($e))
        {
            return response()->json([
                'errors' => 'Incorrect route'
            ], Response::HTTP_NOT_FOUND);
        }
        
        return parent::render($request, $e);
        
    }
    
    public function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }
    
    public function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }
}

?>
