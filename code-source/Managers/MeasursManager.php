<?php
include "../../Views/Layout/root.php";
include_once(__ROOT__ . "/Entities/Measure.php");
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
                throw new Exception($message);
            }
        }
        return $this->Connection;
    }

    public function add($Measures)
    {
        // requête SQL
        $sql = "";
        mysqli_query($this->getConnection(), $sql);
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