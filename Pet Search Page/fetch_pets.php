<?php
include '../database.php';

// Number of pets per page
$petsPerPage = 10;

// Get the page number from the query parameter, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset
$offset = ($page - 1) * $petsPerPage;

// Query to select data from the Pets table with limit and offset
$sql = "SELECT PetID, Name, Species, Age, Sex, Weight, Color, SpayedNeutered, IntakeDate, AdoptionStatus, image_path, Comments FROM Pets WHERE PetID != 0 LIMIT ? OFFSET ?";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind the limit and offset parameters
$stmt->bind_param("ii", $petsPerPage, $offset);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

$pets = [];

// Fetch the pets
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $pets[] = $row;
  }
}

// Query to get the total count of pets
$countSql = "SELECT COUNT(*) AS total FROM Pets WHERE PetID != 0";
$countResult = $conn->query($countSql);
$countRow = $countResult->fetch_assoc();
$totalPets = $countRow['total'];

// Calculate the total number of pages
$totalPages = ceil($totalPets / $petsPerPage);

// Return the pets and the total number of pages
echo json_encode(['pets' => $pets, 'totalPages' => $totalPages]);

// Close the statement and connection
$stmt->close();
$conn->close();
?>
