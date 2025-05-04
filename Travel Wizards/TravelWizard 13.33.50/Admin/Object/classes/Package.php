<?php
require_once 'db1.php';
require_once 'Customer.php';
require_once 'Destination.php';

class Package {
    private $conn;
    private $packageID;
    private $packageName;
    private $airline;
    private $price;
    private $packageType;
    private $destinationID;
    private $destinationName;

    public function __construct($conn, $packageID = null) {
        $this->conn = $conn;
        if ($packageID) {
            $this->loadPackage($packageID);
        }
    }

    private function loadPackage($packageID) {
        $stmt = $this->conn->prepare("
            SELECT p.*, d.name AS destinationName 
            FROM packages p
            LEFT JOIN destinations d ON p.destinationID = d.destinationID
            WHERE p.packageID = ?
        ");
        $stmt->bind_param("i", $packageID);
        $stmt->execute();
        $package = $stmt->get_result()->fetch_assoc();

        if ($package) {
            $this->packageID = $package['packageID'];
            $this->packageName = $package['packageName'];
            $this->airline = $package['airline'];
            $this->price = $package['price'];
            $this->packageType = $package['packageType'];
            $this->destinationID = $package['destinationID'];
            $this->destinationName = $package['destinationName'] ?? 'Not Assigned'; // Handle NULL values
        }
    }

    public function getPackageID() { return $this->packageID; }
    public function getPackageName() { return $this->packageName; }
    public function getAirline() { return $this->airline; }
    public function getPrice() { return $this->price; }
    public function getPackageType() { return $this->packageType; }
    public function getDestinationID() { return $this->destinationID; }
    public function getDestinationName() { return $this->destinationName; }

    public function setPrice($price) {
        $this->price = $price;
        $stmt = $this->conn->prepare("UPDATE packages SET price = ? WHERE packageID = ?");
        $stmt->bind_param("di", $price, $this->packageID);
        $stmt->execute();
    }
}
?>
