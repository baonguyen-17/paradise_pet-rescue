<?php
include '../database.php';

// Sanitize input data
$firstName = $conn->real_escape_string($_POST['FirstName'] ?? '');
$lastName = $conn->real_escape_string($_POST['LastName'] ?? '');
$address = $conn->real_escape_string($_POST['Address'] ?? '');
$city = $conn->real_escape_string($_POST['City'] ?? '');
$stateProvince = $conn->real_escape_string($_POST['StateProvince'] ?? '');
$postalCode = $conn->real_escape_string($_POST['PostalCode'] ?? '');
$emailAddress = $conn->real_escape_string($_POST['EmailAddress'] ?? '');
$phoneNumber = $conn->real_escape_string($_POST['PhoneNumber'] ?? '');
$phoneType = $conn->real_escape_string($_POST['PhoneType'] ?? '');
$agreementAcknowledgement = $conn->real_escape_string($_POST['AgreementAcknowledgement'] ?? '0');
$appliedWithOtherRescue = $conn->real_escape_string($_POST['AppliedWithOtherRescue'] ?? '0');
$ageConfirmation = $conn->real_escape_string($_POST['AgeConfirmation'] ?? '0');
$intendedPetOwnershipType = $conn->real_escape_string($_POST['IntendedPetOwnershipType'] ?? '');
$petKeptLocation = $conn->real_escape_string($_POST['PetKeptLocation'] ?? '');
$petAloneTime = $conn->real_escape_string($_POST['PetAloneTime'] ?? '');
$adoptionReason = $conn->real_escape_string($_POST['AdoptionReason'] ?? '');
$petSurrenderJustification = $conn->real_escape_string($_POST['PetSurrenderJustification'] ?? '');
$petVacationPlans = $conn->real_escape_string($_POST['PetVacationPlans'] ?? '');
$homeType = $conn->real_escape_string($_POST['HomeType'] ?? '');
$yardFencingStatus = $conn->real_escape_string($_POST['YardFencingStatus'] ?? '');
$livingWithRelatives = $conn->real_escape_string($_POST['LivingWithRelatives'] == 'Yes' ? '1' : '0'); // Converted to tinyint value
$currentPetsLocation = $conn->real_escape_string($_POST['CurrentPetsLocation'] ?? '');
$dateOfBirth = $conn->real_escape_string($_POST['DateOfBirth'] ?? '');
$signature = $conn->real_escape_string($_POST['Signature'] ?? '');

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO AdoptionApplications (
    FirstName, LastName, Address, City, StateProvince, PostalCode, 
    EmailAddress, PhoneNumber, PhoneType, AgreementAcknowledgement, 
    AppliedWithOtherRescue, AgeConfirmation, IntendedPetOwnershipType, 
    PetKeptLocation, PetAloneTime, AdoptionReason, PetSurrenderJustification, 
    PetVacationPlans, HomeType, YardFencingStatus, 
    LivingWithRelatives, CurrentPetsLocation, DateOfBirth, Signature) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssssssiisssisssssssss", 
    $firstName, $lastName, $address, $city, $stateProvince, $postalCode, 
    $emailAddress, $phoneNumber, $phoneType, $agreementAcknowledgement, 
    $appliedWithOtherRescue, $ageConfirmation, $intendedPetOwnershipType, 
    $petKeptLocation, $petAloneTime, $adoptionReason, $petSurrenderJustification, 
    $petVacationPlans, $homeType, $yardFencingStatus, 
    $livingWithRelatives, $currentPetsLocation, $dateOfBirth, $signature);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully. Redirecting to home page...";
    header("Refresh:5; url=../index.php");
} else {
    echo "Error: " . $stmt->error;
    header("Refresh:5; url=../index.php");
}

$stmt->close();
$conn->close();
?>
