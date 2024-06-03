<?php

require_once APP_ROOT . "/app/services/PatientService.php";

class HomeCtrl
{

    public function index()
    {
        $patientsService = new PatientService();
        $patients = $patientsService->gettAllPatients();
        /**
         * echo
         */
        // day vao views
        include APP_ROOT . "/app/views/home/index.php";
    }
    // add
    public function viewAdd()
    {
        include APP_ROOT . "/app/views/patient/add.php";
    }

    public function insert($name, $gender)
    {
        $patientsService = new PatientService();
        $patientsService->createPatient($name, $gender);
    }
    // delete
    // public function viewDelete()
    // {
    //     include APP_ROOT . "/app/views/patient/delete.php";
    // }
    public function delete($id)
    {
        $patientsService = new PatientService();
        $patientsService->delete($id);
    }

    public function viewEdit($id)
    {
        $patientsService = new PatientService();
        $patient = $patientsService->getPatient($id);
        include APP_ROOT . "/app/views/patient/edit.php";
    }

    public function edit($id, $name, $gender)
    {
        $patientsService = new PatientService();
        $patientsService->edit($id, $name, $gender);
    }
}
