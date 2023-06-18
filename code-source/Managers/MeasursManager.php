<?php
namespace MyNamespace\Entities\Measures;

use MyNamespace\Entities\Inscription\Inscription;

include_once(__ROOT__ . "/Entities/Measure.php");
include_once(__ROOT__ . "/Entities/Inscription.php");

// use MyNamespace\Entities\Measures\Measures;

class MeasureManager
{
    private $Connection = Null;

    private function getConnection()
    {
        if (is_null($this->Connection)) {
            $this->Connection = mysqli_connect('localhost', 'root', '', 'ia_data');
            // Vérifier l'ouverture de la connexion avec la base de données
            if (!$this->Connection) {
                $message = 'Erreur de connexion: ' . mysqli_connect_error();
                throw new \FFI\Exception($message);
            }
        }
        return $this->Connection;
    }

    public function add($Measures, $gender, $id_user, $age)
    {
        $connection = $this->getConnection();

        // Extract the measure data
        $weight = $Measures->getWeight();
        $height = $Measures->getHeight();
        $neck = $Measures->getNeck();
        $waist = $Measures->getWaist();
        $hip = $Measures->getHip();
        $Id_Inscription = $Measures->Get_Id();

        // Calculate missing measures
        $bodyFat = $this->calculateBodyFat($waist, $neck, $height, $gender, $weight);
        $bmr = $this->calculateBMR($weight, $height, $age, $gender);
        $bmi = $this->calculateBMI($weight, $height);
        $idealWeight = $this->calculateIdealWeight($height, $gender);

        // Prepare the SQL statements for inserting measures and updating gender
        $measureSql = "INSERT INTO Measures (Weight, Height, Neck, Waist, Hip, Body_Fat, BMR, BMI, Ideal_Weight, Id_Inscription) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $userSql = "UPDATE users SET `age` = ?, gender = ? WHERE Id_User = ?";

        // Prepare the statements and bind the parameters
        $measureStmt = $connection->prepare($measureSql);
        $measureStmt->bind_param("dddddddddi", $weight, $height, $neck, $waist, $hip, $bodyFat, $bmr, $bmi, $idealWeight, $Id_Inscription);

        $userStmt = $connection->prepare($userSql);
        $userStmt->bind_param("isi", $age, $gender, $id_user);

        // Execute the statements
        $measureStmt->execute();
        $userStmt->execute();

        // Close the statements
        $measureStmt->close();
        $userStmt->close();
    }


    public function getMeasureData($inscriptionId)
    {
        $connection = $this->getConnection();

        $sql = "SELECT * FROM Measures
                JOIN Inscription ON Measures.Id_Inscription = Inscription.Id_Inscription
                WHERE Measures.Id_Inscription = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $inscriptionId);
        $stmt->execute();
        $result = $stmt->get_result();
        $measureData = $result->fetch_assoc();

        $stmt->close();

        if ($measureData) {
            // Create Inscription object
            $inscription = new Inscription;
            // Set Inscription properties
            $inscription->Set_Id($measureData['Id_Inscription']);
            $inscription->setDateInscription($measureData['Inscription_Date']);
            // ...

            // Create Measures object and set the properties
            $measures = new \MyNamespace\Entities\Inscription\Measures(
                $measureData['Height'],
                $measureData['Weight'],
                $measureData['Neck'],
                $measureData['Waist'],
                $measureData['Hip']
            );
            $measures->setBody_Fat($measureData['Body_Fat']);
            $measures->setBMRt($measureData['BMR']);
            $measures->setBMI($measureData['BMI']);
            $measures->setIdeal_Weigth($measureData['Ideal_Weight']);

            return [$inscription, $measures]; // Return both objects as an array
        } else {
            return null; // Return null if no measure data found
        }
    }


    public function calculateIdealWeight($height, $gender)
    {
        if ($gender === 'Male') {
            // Calculate ideal weight for males using the Devine formula
            $idealWeight = 50 + 2.3 * (($height / 2.54) - 60);
        } elseif ($gender === 'Female') {
            // Calculate ideal weight for females using the Devine formula
            $idealWeight = 45.5 + 2.3 * (($height / 2.54) - 60);
        } else {
            // Invalid gender provided
            return null;
        }

        return $idealWeight;
    }

    public function calculateBodyFat($waist, $neck, $height, $gender, $weight)
    {
        if ($gender === 'Male') {
            // Calculate body fat for males using the U.S. Navy method
            $factor1 = 86.010;
            $factor2 = 70.041;
            $factor3 = 36.76;
            $factor4 = 30.30;
        } elseif ($gender === 'Female') {
            // Calculate body fat for females using the U.S. Navy method
            $factor1 = 163.205;
            $factor2 = 97.684;
            $factor3 = 78.387;
            $factor4 = 34.89;
        } else {
            // Invalid gender provided
            return null;
        }

        // Calculate body fat percentage
        $waistInInches = $waist * 0.393701;
        $neckInInches = $neck * 0.393701;
        $heightInInches = $height * 0.393701;

        $leanBodyMass = $factor1 - ($factor2 * log10($heightInInches + $factor3)) + ($factor4 * log10($waistInInches - $neckInInches));
        $bodyFatPercentage = ($weight - $leanBodyMass) / $weight * 100;

        return $bodyFatPercentage;
    }

    public function calculateBMR($weight, $height, $age, $gender)
    {
        if ($gender === 'Male') {
            // Calculate BMR for Male using Harris-Benedict equation
            $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
        } elseif ($gender === 'Female') {
            // Calculate BMR for Female using Harris-Benedict equation
            $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
        } else {
            // Invalid gender provided
            return null;
        }

        return $bmr;
    }

    public function calculateBMI($weight, $height)
    {
        // Convert height to meters
        $heightInMeters = $height / 100;

        // Calculate BMI
        $bmi = $weight / ($heightInMeters * $heightInMeters);

        // Round the BMI to two decimal places
        $bmi = round($bmi, 2);

        return $bmi;
    }
}