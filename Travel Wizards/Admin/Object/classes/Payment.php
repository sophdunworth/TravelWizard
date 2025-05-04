<?php
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

    private function loadPayment($paymentID) {
        $stmt = $this->conn->prepare("SELECT * FROM payments WHERE paymentID = ?");
        $stmt->bind_param("i", $paymentID);
        $stmt->execute();
        $payment = $stmt->get_result()->fetch_assoc();

        if ($payment) {
            $this->paymentID = $payment['paymentID'];
            $this->booking = new Booking($this->conn, $payment['bookingID']);
            $this->amountPaid = $payment['amountPaid'];
            $this->amountPending = $payment['amountPending'];
            $this->transactionDate = $payment['transactionDate'];
            $this->paymentStatus = $payment['payment_status'];
        }
    }

    public function getAllPayments() {
        $stmt = $this->conn->prepare("SELECT * FROM payments");
        $stmt->execute();
        $result = $stmt->get_result();
        $payments = [];

        while ($row = $result->fetch_assoc()) {
            $payments[] = $row;
        }

        return $payments;
    }

    public function getPaymentID() { return $this->paymentID; }
    public function getBooking() { return $this->booking; }
    public function getAmountPaid() { return $this->amountPaid; }
    public function getAmountPending() { return $this->amountPending; }
    public function getTransactionDate() { return $this->transactionDate; }
    public function getPaymentStatus() { return $this->paymentStatus; }

    public function setPaymentStatus($paymentStatus) {
        $this->paymentStatus = $paymentStatus;
        $stmt = $this->conn->prepare("UPDATE payments SET payment_status = ? WHERE paymentID = ?");
        $stmt->bind_param("si", $paymentStatus, $this->paymentID);
        $stmt->execute();
    }

public function updatePayment($bookingID, $amountPaid, $amountPending, $payment_status, $notes) {
    $stmt = $this->conn->prepare("
        UPDATE payments 
        SET amountPaid = ?, amountPending = ?, payment_status = ?, notes = ?
        WHERE bookingID = ?
    ");
    $stmt->bind_param("ddssi", $amountPaid, $amountPending, $payment_status, $notes, $bookingID);
    return $stmt->execute();
}

}
?>


