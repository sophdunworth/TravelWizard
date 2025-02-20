<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Dolce Vita</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="package">
            <h1>La Dolce Vita  - 23 Days</h1>
            
            <div class="main-image">
                <img src="images/italy.png" alt="La Dolce Vita Adventure">
            </div>
            
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> Aer Lingus</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) to Milan (MXP) - 8:00 AM </p>
                <p><strong>Return Flight:</strong> Sicily (CTA) to Dublin (DUB) - 5:00 AM</p>
                <p><strong>Cost:</strong> €1,700 per person</p>
                <p><strong>Extra Info:</strong> All activities, accommodation, and transport listed are included. Meals not covered unless specified with * symbol.</p>
                <button class="book-now" onclick="window.location.href='booking.php';">Book Now</button>
                
            </div>
            
            <?php
                $destinations = [
                    ["title" => "Days 1-4: Milan", "details" => [
                        "Day 1: Arrival in Milan, Check-in: Hotel Principe di Savoia, Stroll through Piazza del Duomo, Dinner at Cracco*.",
                        "Day 2: Visit Duomo di Milano, Sforza Castle, Galleria Vittorio Emanuele II. Dinner at Nobu Milano.",
                        "Day 3: Day Trip to Lake Como - Visit Bellagio and Varenna, Lakeside lunch. Return to Milan, Dinner at Il Luogo di Aimo e Nadia*.",
                        "Day 4: Explore Milan’s Quadrilatero d'Oro for high-end fashion. Dinner at Ristorante Cracco*."
                    ]],
                    ["title" => "Days 5-7: Venice", "details" => [
                        "Day 5: Travel to Venice, Check-in: Hotel Danieli, Gondola ride along Grand Canal, Dinner at Antiche Carampane.",
                        "Day 6: Visit St. Mark’s Basilica, Doge’s Palace, Rialto Bridge. Dinner at Osteria alle Testiere*.",
                        "Day 7: Boat tour to Murano & Burano Islands. Return to Venice, Dinner at La Caravella."
                    ]],
                    ["title" => "Days 8-10: Florence", "details" => [
                        "Day 8: Travel to Florence, Check-in: Four Seasons Hotel Firenze, Dinner at Osteria All'Antico Vinaio*.",
                        "Day 9: Visit Uffizi Gallery, Duomo di Santa Maria del Fiore, Ponte Vecchio. Dinner at Enoteca Pinchiorri.",
                        "Day 10: Day Trip to Chianti Region for vineyard tours and wine tastings. Return to Florence for dinner."
                    ]],
                    ["title" => "Days 11-12: Pisa", "details" => [
                        "Day 11: Travel to Pisa, Check-in: Hotel Bologna, Visit Leaning Tower of Pisa, Piazza dei Miracoli. Dinner at Ristorante La Buca.",
                        "Day 12: Visit Pisa Cathedral, Pisa Baptistery, Botanical Garden of Pisa. Dinner at Il Vecchio Marino*."
                    ]],
                    ["title" => "Days 13-16: Rome", "details" => [
                        "Day 13: Travel to Rome, Check-in: Hotel de Russie, Dinner at La Pergola.",
                        "Day 14: Visit Colosseum, Roman Forum, Pantheon, Trevi Fountain, Piazza di Spagna. Dinner at Antico Arco*.",
                        "Day 15: Vatican City Tour - St. Peter’s Basilica, Vatican Museums, Sistine Chapel. Dinner at Il Pagliaccio*.",
                        "Day 16: Day Trip to Tivoli - Villa d'Este, Hadrian’s Villa. Return to Rome for dinner."
                    ]],
                    ["title" => "Days 17-19: Naples", "details" => [
                        "Day 17: Travel to Naples, Check-in: Grand Hotel Vesuvio, Explore Spaccanapoli district, Dinner at La Cantina dei Lazzari.",
                        "Day 18: Visit Pompeii Archaeological Site, Mount Vesuvius. Dinner at Ristorante Palazzo Petrucci.",
                        "Day 19: Visit Naples National Archaeological Museum, Castel dell'Ovo, Spaccanapoli. Dinner at Da Michele*."
                    ]],
                    ["title" => "Days 20-22: Sicily (Palermo & Catania)", "details" => [
                        "Day 20: Travel to Palermo, Check-in: Villa Igiea, Dinner at Antica Focacceria San Francesco.",
                        "Day 21: Visit Palermo Cathedral, Norman Palace, Catacombs of the Capuchins. Dinner at Il Crocifisso*.",
                        "Day 22: Travel to Catania, Check-in: Palace Catania | UNA Esperienze, Explore Mount Etna, Seafood dinner in Catania.",
                        "Day 23: Departure"
                    ]]
                    
                ];
            ?>
            
            <?php foreach ($destinations as $destination): ?>
                <div class="destination">
                    <h2><?php echo htmlspecialchars($destination["title"]); ?></h2>
                    <?php foreach ($destination["details"] as $detail): ?>
                        <p><?php echo htmlspecialchars($detail); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>
