<?php
require_once __DIR__ . '/../db1.php';
require_once __DIR__ . '/Customer.php';
require_once __DIR__ . '/Destination.php';

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
        $sql = "
            SELECT p.*, d.name AS destinationName 
            FROM packages p
            LEFT JOIN destinations d ON p.destinationID = d.destinationID
            WHERE p.packageID = :packageID
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['packageID' => $packageID]);
        $package = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($package) {
            $this->packageID = $package['packageID'];
            $this->packageName = $package['packageName'];
            $this->airline = $package['airline'];
            $this->price = $package['price'];
            $this->packageType = $package['packageType'];
            $this->destinationID = $package['destinationID'];
            $this->destinationName = $package['destinationName'] ?? 'Not Assigned';
        }
    }

    public static function filterByPrice($conn, $min, $max) {
        $sql = "SELECT packageID FROM packages WHERE price BETWEEN :min AND :max";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['min' => $min, 'max' => $max]);
        $packages = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $packages[] = new self($conn, $row['packageID']);
        }

        return $packages;
    }

    public static function filterByDestinationType($conn, $type) {
        $sql = "SELECT packageID FROM packages WHERE packageType = :type";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['type' => $type]);
        $packages = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $packages[] = new self($conn, $row['packageID']);
        }

        return $packages;
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
        $sql = "UPDATE packages SET price = :price WHERE packageID = :packageID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'price' => $price,
            'packageID' => $this->packageID
        ]);
    }
}
?>

