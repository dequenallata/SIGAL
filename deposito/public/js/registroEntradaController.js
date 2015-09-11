"use strict";

angular.module('deposito').
controller('registroEntradaController',function($scope,$http){

  $scope.codigo;
  $scope.codigoInsumo = '';
  $scope.provedores = [];
  $scope.provedor;
  $scope.insumos = [];
  $scope.alert = {};
  
  getProvedores();

  $scope.agregarInsumos = function(){

    if( $scope.codigoInsumo  == ''){
      $scope.alert = {type:"danger" , msg:"Porfavor especifique un insumo"};
      return;
    }

    if( insumoExist($scope.codigoInsumo) ){
      $scope.alert = {type:"danger" , msg:"Este insumo ya se ha agregado en esta entrada"};
      return; 
    }

    $http.get('/getInsumoCode/' + $scope.codigoInsumo)
      .success(

        function(response){
          if( response.status == 'danger'){
            $scope.alert = {"type":response.status , "msg":response.menssage};
          }
          else{
            $scope.insumos.push(response);
            $scope.codigoInsumo = '';
          }
        }
      );
  }

  $scope.registroEntrada = function(){

    var data = {

      'codigo'  : $scope.codigo,
      'provedor': $scope.provedor,
      'insumos' : $scope.insumos
    };

    if( !validaCantidad() )
      $scope.alert = {type:"danger" , msg:"Especifique un valor valido para cada insumo"};
    
  }

  $scope.eliminarInsumo = function(index){
    $scope.insumos.splice(index, 1);
  };

  $scope.closeAlert = function(){
    $scope.alert = {};
  };

  function insumoExist(codigo){

    var index;

    for(index in $scope.insumos){
      if($scope.insumos[index].codigo  == codigo)
        return true;
    }

    return false;
  };

  function validaCantidad(){
    var index;

    for( index in $scope.insumos){
      if( !$scope.insumos[index].cantidad )
        return false;
    }

    return true;
  }

  function getProvedores(){

    $http.get('/getProvedores')
      .success( function(response){ $scope.provedores = response;});
  }

});