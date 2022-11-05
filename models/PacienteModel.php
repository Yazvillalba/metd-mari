<?php
class PacienteModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_turnos_facil;charset=utf8', 'root', '');
    }

    function getPaciente($dni){
        $query = $this->db->prepare('SELECT * FROM paciente WHERE dni =?');
        $query->execute([$dni]);
        $paciente = $query->fetch(PDO::FETCH_OBJ);
        return  $paciente;
    }
    
    function getAllMedicos(){
        $query = $this->db->prepare('SELECT * FROM medico ORDER BY apellido ASC');
        $query->execute();
        $medicos = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $medicos;
    }
    
    function getAllObrasSociales(){
        $query = $this->db->prepare('SELECT * FROM obra_social ORDER BY nombre_os ASC');
        $query->execute();
        $obrasSociales = $query->fetchAll(PDO::FETCH_OBJ);
        return  $obrasSociales;
    }

    function getMedicoById($id){
        $query = $this->db->prepare('SELECT * FROM medico WHERE id = ');
        $query->execute([$id]);
        $medico = $query->fetch(PDO::FETCH_OBJ); 
        return  $medico;
    }

    function getTurnosMedicoById($id){
        $query = $this->db->prepare('SELECT m.apellido, m.nombre, t.fecha, t.horario 
                                    FROM medico m JOIN turno t 
                                    ON m.id = t.id_medico
                                    WHERE m.id = ?');
        $query->execute([$id]);
        $turnosMedico = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $turnosMedico;
    }

    function getMedicosByObraSocial($obraSocial){
        $query = $this->db->prepare('SELECT DISTINCT m.apellido, m.nombre, os.nombre_os, m.matricula, m.importe_consulta, m.especialidad
                                    FROM obra_social os JOIN medico_os mo 
                                    ON os.id = mo.id_obra_social
                                    JOIN medico m 
                                    ON m.id = mo.id_medico
                                    WHERE os.id = ?
                                    ORDER BY m.apellido ASC');
        $query->execute([$obraSocial]);
        $medicosPorObraSocial = $query->fetchAll(PDO::FETCH_OBJ);
        return  $medicosPorObraSocial;
    }


}