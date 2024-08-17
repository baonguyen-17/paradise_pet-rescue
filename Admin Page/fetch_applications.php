<?php
// fetch_applications.php

// Include the database connection
include '../database.php';

// Fetch all application data
$sql = "SELECT 
            a.ApplicationID, a.PetID, a.FirstName, a.LastName, a.Address, a.City, a.StateProvince, a.PostalCode, 
            a.EmailAddress, a.PhoneNumber, a.PhoneType, a.AgreementAcknowledgement, 
            a.AppliedWithOtherRescue, a.AgeConfirmation, a.IntendedPetOwnershipType, 
            a.PetKeptLocation, a.PetAloneTime, a.AdoptionReason, a.PetSurrenderJustification, 
            a.PetVacationPlans, a.HomeType, a.YardFencingStatus, 
            a.LivingWithRelatives, a.CurrentPetsLocation, a.ApplicationStatus, a.DateOfBirth, a.Signature,
            p.image_path
        FROM AdoptionApplications a
        LEFT JOIN Pets p ON a.PetID = p.PetID"; // LEFT JOIN in case there are applications without a PetID

$result = $conn->query($sql);
$applications = [];

if ($result->num_rows > 0) {
    // Gather data into an array
    while($row = $result->fetch_assoc()) {
        $applications[] = [
            "applicationID" => htmlspecialchars($row["ApplicationID"]),
            "petID" => htmlspecialchars($row["PetID"]),
            "firstName" => htmlspecialchars($row["FirstName"]),
            "lastName" => htmlspecialchars($row["LastName"]),
            "address" => htmlspecialchars($row["Address"]),
            "city" => htmlspecialchars($row["City"]),
            "stateProvince" => htmlspecialchars($row["StateProvince"]),
            "postalCode" => htmlspecialchars($row["PostalCode"]),
            "email" => htmlspecialchars($row["EmailAddress"]),
            "phoneNumber" => htmlspecialchars($row["PhoneNumber"]),
            "phoneType" => htmlspecialchars($row["PhoneType"]),
            "agreementAcknowledgement" => htmlspecialchars($row["AgreementAcknowledgement"]),
            "appliedWithOtherRescue" => htmlspecialchars($row["AppliedWithOtherRescue"]),
            "ageConfirmation" => htmlspecialchars($row["AgeConfirmation"]),
            "intendedPetOwnershipType" => htmlspecialchars($row["IntendedPetOwnershipType"]),
            "petKeptLocation" => htmlspecialchars($row["PetKeptLocation"]),
            "petAloneTime" => htmlspecialchars($row["PetAloneTime"]),
            "adoptionReason" => htmlspecialchars($row["AdoptionReason"]),
            "petSurrenderJustification" => htmlspecialchars($row["PetSurrenderJustification"]),
            "petVacationPlans" => htmlspecialchars($row["PetVacationPlans"]),
            "homeType" => htmlspecialchars($row["HomeType"]),
            "yardFencingStatus" => htmlspecialchars($row["YardFencingStatus"]),
            "livingWithRelatives" => htmlspecialchars($row["LivingWithRelatives"]),
            "currentPetsLocation" => htmlspecialchars($row["CurrentPetsLocation"]),
            "applicationStatus" => htmlspecialchars($row["ApplicationStatus"]),
            "dateOfBirth" => htmlspecialchars($row["DateOfBirth"]),
            "signature" => htmlspecialchars($row["Signature"]),
            "image_path" => htmlspecialchars($row["image_path"]) // Add this line to include image_path
        ];
    }
}

// Close connection
$conn->close();

// Set header to output JSON
header('Content-Type: application/json');

// Output the JSON data
echo json_encode($applications);
?>
