<?php

namespace App\Providers;

use Validator;
use App\Insumo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Custom validation rules 
         */

        Validator::extend('alpha_spaces', function($attribute, $value)
        {
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::extend('cedula', function($attribute, $value)
        {
            return preg_match('/^([0-9]{6,8})$/', $value);
        });

        Validator::extend('rif', function($attribute, $value)
        {
            return preg_match('/^([J,G]-([0-9]{8,9})-[0-9])$/', $value);
        });
        
        Validator::extend('insumos', function($attribute, $value)
        {   
            if( empty($value) || !is_array($value)){
                return false; 
            }
            else{

                foreach ($value as $insumo){
                    if( !isset($insumo['cantidad']) || !isset($insumo['id']) || $insumo['cantidad'] <= 0
                        || !is_int($insumo['cantidad']) || !Insumo::where('id',$insumo['id'])->first())

                        return false;
                }
            }
            
            return true;
        });

        Validator::extend('insumos_salida', function($attribute, $value)
        {   
            if( empty($value) || !is_array($value)){
                return false; 
            }
            else{

                foreach ($value as $insumo){
                    if( !isset($insumo['solicitado']) || !isset($insumo['despachado']) || 
                        !isset($insumo['id']) || $insumo['solicitado'] <= 0 ||
                        $insumo['despachado'] <= 0 || $insumo['solicitado'] < $insumo['despachado'] ||
                        !is_int($insumo['solicitado']) || !is_int($insumo['despachado']) ||  
                        !Insumo::where('id',$insumo['id'])->first())

                        return false;
                }
            }
            
            return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
