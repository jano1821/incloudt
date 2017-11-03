<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Criteria;
class ControllerBase extends Controller {

    public function validarSession() {
        if (!$this->session->has("Usuario")) {
            $this->response->redirect('index');
        }else{
            $usuario = $this->session->get("Usuario");
            $ultimoAcceso = $usuario['ultimoAcceso'];
            $tiempoSesion = $usuario['tiempoSesion'];
            
            $ahora = date("Y-n-j H:i:s");
            $tiempo_transcurrido = (strtotime($ahora) - strtotime($ultimoAcceso));
            
            if ($tiempo_transcurrido >= ($tiempoSesion*60)) {
                $this->session->destroy();
                $this->response->redirect('index');
            }else {
                $_SESSION["ultimoAcceso"] = $ahora;
            }
        }
    }

    public static function fromInput($dependencyInjector,
                                     $modelName,
                                     $data) {
        $conditions = array();
        if (count($data)) {
            $metaData = $dependencyInjector->getShared('modelsMetadata');
            $model = new $modelName();
            $dataTypes = $metaData->getDataTypes($model);
            $columnMap = $metaData->getReverseColumnMap($model);
            $bind = array();

            foreach ($data as $fieldName => $value) {
                if (isset($columnMap[$fieldName])) {
                    $field = $columnMap[$fieldName];
                }else {
                    continue;
                }

                if (isset($dataTypes[$field])) {
                    if (!is_null($value)) {
                        if ($value != '') {
                            /**
                             * si el campo es de tipo varchar o text aplicamos la clausula like
                             * int = 0
                             * timestamp = 1
                             * varchar = 2
                             * char = 5
                             * text = 6
                             */
                            //si es varchar text o timestamp utilizamos like
                            if ($dataTypes[$field] == 2 || $dataTypes[$field] == 6 || $dataTypes[$field] == 1) {
                                $condition = $fieldName . " LIKE :" . $fieldName . ":";
                                $bind[$fieldName] = '%' . $value . '%';
                            }
                            //en otro caso buscamos la búsqueda exacta
                            else {
                                $condition = $fieldName . ' = :' . $fieldName . ':';
                                $bind[$fieldName] = $value;
                            }
                            $conditions[] = $condition;
                        }
                    }
                }
            }
        }

        $criteria = new Criteria();
        if (count($conditions)) {
            $criteria->where(join(' AND ',
                                  $conditions));
            $criteria->bind($bind);
        }
        return $criteria;
    }
    
    public function _sesionActiva() {
        
        
        if ($_SESSION["autenticado"] != "SI") {
            session_destroy();
            include("../../view/generales/SessionExpirada.php");
            $sessionExpirada = new SessionExpirada;
            $sessionExpirada->mostrarSessionExpirada($URL);
            return false;
        }else {
            try {
                $fechaGuardada = $_SESSION["ultimoAcceso"];
            }catch (Exception $indexColumnas) {
                $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
            }
            $ahora = date("Y-n-j H:i:s");
            $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

            if ($tiempo_transcurrido >= 1200) {
                session_destroy();
                include("../../view/generales/SessionExpirada.php");
                $sessionExpirada = new SessionExpirada;
                $sessionExpirada->mostrarSessionExpirada($URL);
                return false;
            }else {
                $_SESSION["ultimoAcceso"] = $ahora;
                return true;
            }
        }
    }
}