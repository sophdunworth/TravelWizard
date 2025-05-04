<?php
require_once __DIR__ . '/../db1.php';
require_once 'Booking.php'; 

class Payment {
    private $conn;
    private $paymentID;
    private $booking;
    private $amountPaid;
    private $amountPending;
    private $transactionDate;
    private $paymentStatus;

    public function __construct($conn, $paymentID = null) {
        $this->conn = $conn;
        if ($paymentID) {
            $this->loadPayment($paymentID);
        }
    }

    // Load payment details by paymentID
    private function loadPayment($paymentID) {
        $stmt = $this->conn->prepare("SELECT * FROM payments WHERE paymentID = ?");
        $stmt->execute([$paymentID]);
        $payment = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($payment) {
            $this->paymentID = $payment['paymentID'];
            $this->booking = new Booking($this->conn, $payment['bookingID']);
            $this->amountPaid = $payment['amountPaid'];
            $this->amountPending = $payment['amountPending'];
            $this->transactionDate = $payment['transactionDate'];
            $this->paymentStatus = $payment['payment_status'];
        }
    }

    // Get all payments
    public function getAllPayments() {
        $stmt = $this->conn->prepare("SELECT * FROM payments");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Getters
    public function getPaymentID() { return $this->paymentID; }
    public function getBooking() { return $this->booking; }
    public function getAmountPaid() { return $this->amountPaid; }
    public function getAmountPending() { return $this->amountPending; }
    public function getTransactionDate() { return $this->transactionDate; }
    public function getPaymentStatus() { return $this->paymentStatus; }

    // Set and update payment status
    public function setPaymentStatus($paymentStatus) {
        $this->paymentStatus = $paymentStatus;
        $stmt = $this->conn->prepare("UPDATE payments SET payment_status = ? WHERE paymentID = ?");
        $stmt->execute([$paymentStatus, $this->paymentID]);
    }

    // Update payment details based on booking ID
    public function updatePayment($bookingID, $amountPaid, $amountPending, $paymentStatus, $notes) {
        $stmt = $this->conn->prepare("
            UPDATE payments 
            SET amountPaid = ?, amountPending = ?, payment_status = ?, notes = ?
            WHERE bookingID = ?
        ");
        return $stmt->execute([$amountPaid, $amountPending, $paymentStatus, $notes, $bookingID]);
    }
}
?>
