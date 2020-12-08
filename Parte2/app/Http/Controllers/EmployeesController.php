<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleXMLElement;
class EmployeesController extends Controller
{
    //Listar los empleados del archivo employees.json
    function Inicio(){
        return view('welcome');
    }
    function List_employees(){

        $path = storage_path().'\employees.json';//Ruta del archivo employees.json
     
        $json = file_get_contents($path);//se lee el archivo a string

        $employees = json_decode($json);

        return view('Employees',\compact('employees'));
        
    }
//Obtener detalle de un empleado
    function Detail(){
        $path = storage_path().'\employees.json';//Ruta del archivo employees.json
     
        $json = file_get_contents($path);//se lee el archivo a string
        
        $employees = json_decode($json);

        if (isset($_POST['employe_id']))
        {
            $id = $_POST['employe_id'];
        for ($i=0; $i < \count($employees) ; $i++) { 
            if ($employees[$i]->id == $id) {
               return \response(\json_encode($employees[$i]),200)->header('Content-type','text/json');
            }
        }
        }
    }
    //End point de salary con parametros de min y max retorna un json
    function service($min,$max){

        $path = storage_path().'\employees.json';//Ruta del archivo employees.json
     
        $json = file_get_contents($path);//se lee el archivo a string
        
        $employees = json_decode($json);

        $minimo_double = floatval($min);//convierto el minimo en double

        $maximo_double = floatval($max);//convierto el maximo en double

        $arreglo=array();
        $xml = new \SimpleXMLElement('<root/>');
           
        for ($i=0; $i < count($employees); $i++) { 
            if ((float)(str_replace(array(',','$'),"",$employees[$i]->salary)) > $minimo_double && (float)(str_replace(array(',','$'),"",$employees[$i]->salary)) < $maximo_double) {
                
                $result = $xml->addChild("Employee");
                foreach($employees[$i] as $name => $value){
                
                    if(is_array($value)){
                        $array = $result->addChild("skills");

                        foreach ($value as $key => $skill) {
                            foreach ($skill as $nameKey => $data) {
                                $array -> addChild($nameKey,$data);
                            }
                        ;
                        }
                    }else{
                        $result->addChild($name,$value);
                    }
                    
            }
        }
    }
        return \response($xml->asXML(),200)->header('Content-type','text/xml');
    }
      
}