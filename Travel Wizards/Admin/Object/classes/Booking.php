<?php
require_once __DIR__ . '/../db1.php';
require_once 'Customer.php';
require_once 'Package.php';
require_once 'Booking.php';

class Booking {
    private $conn;
    private $bookingID;
    private $customerID;
    private $packageID;
    private $dateBooked;
    private $status;

    public function __construct($conn, $bookingID = null) {
        $this->conn = $conn;
        if ($bookingID) {
            $this->loadBooking($bookingID);
        }
    }

    private function loadBooking($bookingID) {
        $stmt = $this->conn->prepare("SELECT * FROM bookings WHERE bookingID = ?");
        $stmt->bind_param("i", $bookingID);
        $stmt->execute();
        $booking = $stmt->get_result()->fetch_assoc();

        if ($booking) {
            $this->bookingID = $booking['bookingID'];
            $this->customerID = $booking['customerID'];
            $this->packageID = $booking['packageID'];
            $this->dateBooked = $booking['dateBooked'];
            $this->status = $booking['status'];
        }
    }

    public function getBookingID() { return $this->bookingID; }
    public function getCustomerID() { return $this->customerID; }
    public function getPackageID() { return $this->packageID; }
    public function getDateBooked() { return $this->dateBooked; }
    public function getStatus() { return $this->status; }

    public function setStatus($status) {
        $this->status = $status;
        $stmt = $this->conn->prepare("UPDATE bookings SET status = ? WHERE bookingID = ?");
        $stmt->bind_param("si", $status, $this->bookingID);
        $stmt->execute();
    }
    
    public function updateBookingStatus($bookingID, $status) {
    $stmt = $this->conn->prepare("UPDATE bookings SET status = ? WHERE bookingID = ?");
    $stmt->bind_param("si", $status, $bookingID);
    return $stmt->execute();
}

}
?>

