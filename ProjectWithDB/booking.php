<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Page</title>
    <link rel="stylesheet" href="css/Booking.css">
</head>
<body>

<main>
<h1>Booking Form</h1>
<?php
            // Retrieve selected travel dates from URL parameters
            $departure = $_GET['departure'] ?? 'Not Selected';
            $return = $_GET['return'] ?? 'Not Selected';
        ?>
 
        <form action="confirm_booking.php" method="POST">
<input type="hidden" name="departure" value="<?php echo htmlspecialchars($departure); ?>">
<input type="hidden" name="return" value="<?php echo htmlspecialchars($return); ?>">
 
            <section>
<h2>Personal Details</h2>
<?php
                    $fields = [
                        "First Name" => "first_name",
                        "Surname" => "surname",
                        "Date of Birth (DD/MM/YYYY)" => "dob",
                        "House Number" => "house_number",
                        "Road Name" => "road_name",
                        "Town" => "town",
                        "County" => "county",
                        "Country" => "country",
                        "EIRCODE" => "eircode"
                    ];
                    foreach ($fields as $label => $name) {
                        echo "<label>$label: <input type='text' name='$name' required></label><br>";
                    }
                ?>
</section>
<section>
<h2>Payment Details</h2>
<label><input type="radio" name="payment_type" value="full" required> Full Payment</label>
<label><input type="radio" name="payment_type" value="installments"> Installments (3 months)</label>
<br>
<label><input type="radio" name="card_type" value="credit" required> Credit Card</label>
<label><input type="radio" name="card_type" value="debit"> Debit Card</label>
<br>
<?php
                    $payment_fields = [
                        "Cardholder Name" => "cardholder_name",
                        "Card Number (16 digits)" => "card_number",
                        "Expiry Date (MM/YY)" => "expiry_date",
                        "CVC (3 digits)" => "cvc"
                    ];
                    foreach ($payment_fields as $label => $name) {
                        echo "<label>$label: <input type='text' name='$name' required></label><br>";
                    }
                ?>
</section>
<section>
<h2>Passport Information</h2>
<?php
                    $passport_fields = [
                        "First Name (Passport)" => "passport_first_name",
                        "Second Name (Passport)" => "passport_second_name",
                        "Passport Number" => "passport_number",
                        "Expiry Date (DD/MM/YYYY)" => "passport_expiry"
                    ];
                    foreach ($passport_fields as $label => $name) {
                        echo "<label>$label: <input type='text' name='$name' required></label><br>";
                    }
                ?>
<label>Country of Issue:</label>
<select name="passport_country" required>
<option value="">Select Country</option>
<?php
                        $countries = [
                            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                            "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                            "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon",
                            "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo", "Costa Rica",
                            "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt",
                            "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon",
                            "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana",
                            "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel",
                            "Italy", "Ivory Coast", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan",
                            "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar",
                            "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia",
                            "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal",
                            "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway", "Oman", "Pakistan", "Palau",
                            "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania",
                            "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Saudi Arabia", "Senegal", "Serbia",
                            "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan",
                            "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Tajikistan", "Tanzania", "Thailand",
                            "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine",
                            "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen",
                            "Zambia", "Zimbabwe"
                        ];
                        foreach ($countries as $country) {
                            echo "<option value=\"$country\">$country</option>";
                        }
                    ?>
</select>
</section>
<section>
<h2>Health and Safety</h2>
<label>Emergency Contact Name: <input type="text" name="emergency_name" required></label><br>
<label>Emergency Phone: <input type="text" name="emergency_phone" required></label><br>
<label>Emergency Address: <input type="text" name="emergency_address" required></label><br>
<label><input type="checkbox" id="allergies_check"> Allergies</label>
<input type="text" id="allergies_input" name="allergies" style="display:none;" placeholder="Specify allergies">
</section>
 
<button type="button" onclick="window.location.href='confirm.php';">Proceed to Confirmation</button>
<button type="button" onclick="history.back();">Cancel</button>
</form>
</main>
 
    <script>
        document.getElementById('allergies_check').addEventListener('change', function() {
            document.getElementById('allergies_input').style.display = this.checked ? 'block' : 'none';
        });
</script>
</body>
</html>                                                                                                                                                           <?php
// Retrieve booking details
$departure = $_POST['departure'] ?? 'Not Selected';
$return = $_POST['return'] ?? 'Not Selected';
 
?>