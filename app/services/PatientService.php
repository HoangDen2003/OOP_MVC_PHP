<?php

require_once APP_ROOT . "/app/models/Patient.php";
// require_once APP_ROOT . "/app/views/patient/add.php";

class PatientService
{

    public function gettAllPatients()
    {
        $patients = [];
        $connectDB = new ConnectDB();

        if ($connectDB != null) {
            $conn = $connectDB->getConnect();

            if ($conn != null) {
                $sql = "SELECT * FROM patients";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch()) {
                    $patient = new Patient($row["id"], $row["name"], $row["gender"]);
                    $patients[] = $patient;
                }

                return $patients;
            }
        }
    }

    public function createPatient($name, $gender)
    {
        $connectDB = new ConnectDB();

        if ($connectDB != null) {
            $conn = $connectDB->getConnect();
            if ($conn != null) {
                $insertSQL = "INSERT INTO patients (name, gender) VALUES('$name', '$gender');";
                $result = $conn->query($insertSQL);
                if ($result) {
                    echo "Success";
                    header("Location: " . DOMAIN . "public/");
                }
            }
        }

        // if ($_SERVER["REQUEST_METHOD"] === "POST") {
    }

    public function delete($id)
    {
        $db = new ConnectDB();
        $conn = $db->getConnect();
        if ($conn != null) {
            $deleteSQL = "DELETE FROM patients WHERE id = $id ";
            $result = $conn->query($deleteSQL);
            if ($result) {
                header("Location: " . DOMAIN . "public");
                return true;
            } else {
                return false;
            }
        }
    }

    public function edit($id, $name, $gender)
    {
        $db = new ConnectDB();
        $conn = $db->getConnect();
        if ($conn != null) {
            $updateSQL = "UPDATE patients SET name = '$name', gender = '$gender' WHERE id = $id ";
            $result = $conn->query($updateSQL);
            if ($result) {
                header("Location: " . DOMAIN . "public");
                return true;
            } else {
                return false;
            }
        }
    }

    public function getPatient($id)
    {
        $conn = mysqli_connect('localhost', 'root', '', 'testdemo');
        if ($conn != null) {
            $slSQL = "SELECT * FROM patients WHERE id = $id ";
            $result = mysqli_query($conn, $slSQL);
            $row = mysqli_fetch_array($result);
            if ($row) {
                $patient = new Patient($row["id"], $row["name"], $row["gender"]);
                return $patient;
            } else {
                echo "Failed";
            }
        }
    }
}
