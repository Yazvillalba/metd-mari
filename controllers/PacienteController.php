<?php

include_once('models/PacienteModel.php');
include_once('views/PacienteView.php');
include_once('helper/AuthHelper.php');

class PacienteController{

    private $pacienteModel;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->pacienteModel = new PacienteModel();
        $this->view = new PacienteView();
        $this->authHelper = new AuthHelper();
    }

    public function indexTurno()
    {
        $medicos = $this->pacienteModel->getAllMedicos();
        $obrasSociales = $this->pacienteModel->getAllObrasSociales();
        $this->view->showIndexTurno($medicos, $obrasSociales);
    }

    public function indexMedico()
    {
        if(!empty($_POST['medico']) ){
        $id = $_REQUEST['medico'];
        $turnosMedico = $this->pacienteModel->getTurnosMedicoById($id);
        $this->view->showIndexTurnosMedico($turnosMedico);
        }
    }

    public function indexObraSocial()
    {
        if(!empty($_POST['obraSocialSelect']) && ($_POST['obraSocialSelect']) != 'particular'){
        $obraSocial_id = $_REQUEST['obraSocialSelect'];
        $medicosPorObraSocial = $this->pacienteModel->getMedicosByObraSocial($obraSocial_id);
        }
        else {
        $medicosPorObraSocial = $this->pacienteModel->getAllMedicos(); 
        }
        $this->view->showIndexMedicosObraSocial($medicosPorObraSocial);
    }

    

}