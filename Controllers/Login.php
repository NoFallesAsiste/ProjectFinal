<?php
class Login extends Controllers{
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['login']))
        {
            header('Location: '.base_url().'/dashboard');
        }
        parent::__construct();
    }

    public function login()
    {
        $data['page_tag'] = "Login - Sistema Asistencia Aprendices";
        $data['page_title'] = "No Falles, Asiste.";
        $data['page_name'] = "login";
        $data['page_functions_js']="functions_login.js";
        
        $this->views->getView($this,"login",$data);
    }    
    public function loginUser(){
        //dep($_POST);
        if($_POST){
            if(empty($_POST['txtEmail']) || empty($_POST['txtPassword'])){
                $arrResponse = array ('status' => false, 'msg' => 'Error de datos');
            }else{
                $strUsuario = strtolower(strClean($_POST['txtEmail']));
                $strPassword = strClean($_POST['txtPassword']);
                $requestUser = $this->model->loginUser($strUsuario, $strPassword);

                if(empty($requestUser)){
                    $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto. ');
                }else{
                    $arrData = $requestUser;

                    if($arrData['estado_usuario_idestado_usuario'] !=0){
                            
                        $_SESSION['idUser'] = $arrData['idusuario'];

                        $_SESSION['login'] = true;

                        $arrData = $this->model->sessionLogin($_SESSION['idUser']);
                        $_SESSION['userData'] = $arrData;
                        $arrRol = $_SESSION['userData']['idrol'];

                                            
                        
                        switch ($arrRol){
                            case 1:
                                $arrResponse = array('status' => true, 'msg' => '1');
                                break;
                            case 2:


                                $arrResponse = array('status' => true, 'msg' => '2');
                                break;
                            case 3:
                                $arrResponse = array('status' => true, 'msg' =>'3');    
                                break;
                            default :
                                $arrResponse = array('status' => true, 'msg' =>'4');    
                                break;
                            }                        
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'Usuario inactivo.');
                        }
                        
                    
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }

        die();
    }
}