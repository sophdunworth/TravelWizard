<?php
require_once 'db1.php';
require_once 'Customer.php';
require_once 'Package.php';

class Destination {
    private $conn;
    private $destinationID;
    private $name;
    private $description;
    private $price;
    private $image;

    public function __construct($conn, $destinationID = null) {
        $this->conn = $conn;
        if ($destinationID) {
            $this->loadDestination($destinationID);
        }
    }

    private function loadDestination($destinationID) {
        $stmt = $this->conn->prepare("SELECT * FROM destinations WHERE destinationID = ?");
        $stmt->bind_param("i", $destinationID);
        $stmt->execute();
        $destination = $stmt->get_result()->fetch_assoc();

        if ($destination) {
            $this->destinationID = $destination['destinationID'];
            $this->name = $destination['name'];
            $this->description = $destination['description'];
            $this->price = $destination['price'];
            $this->image = $destination['image'];
        }
    }

    public function getDestinationID() { return $this->destinationID; }
    public function getName() { return $this->name; }
    public function getDescription() { return $this->description; }
    public function getPrice() { return $this->price; }
    public function getImage() { return $this->image; }
}
?>

