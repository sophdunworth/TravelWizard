CREATE TABLE bookings (
    bookingID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT NOT NULL,
    packageID INT NOT NULL,
    destination VARCHAR(255) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    dateBooked TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pending', 'Confirmed', 'Cancelled') DEFAULT 'Pending'
);


CREATE TABLE payments (
    paymentID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT NOT NULL,
    bookingID INT NOT NULL,
    payment_type ENUM('Full', 'Installments') NOT NULL,
    card_type ENUM('Credit', 'Debit') NOT NULL,
    cardholder_name VARCHAR(255) NOT NULL,
    card_number VARCHAR(16) NOT NULL,
    expiry_date VARCHAR(5) NOT NULL, -- Format: MM/YY
    cvc VARCHAR(3) NOT NULL,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (bookingID) REFERENCES bookings(bookingID) ON DELETE CASCADE,
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
);
travelwizard