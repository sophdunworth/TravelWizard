import java.sql.*;
import java.time.LocalDate;

public class BookingManager {
    private static final String URL = "jdbc:mysql://localhost:3306/travel_db";
    private static final String USER = "root";
    private static final String PASSWORD = "password";

    public static void cancelBooking(int bookingId) {
        String fetchDateSql = "SELECT departure_date FROM bookings WHERE id = ?";
        String deleteSql = "DELETE FROM bookings WHERE id = ?";

        try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD);
             PreparedStatement fetchStmt = conn.prepareStatement(fetchDateSql)) {
            
            fetchStmt.setInt(1, bookingId);
            ResultSet rs = fetchStmt.executeQuery();
            
            if (rs.next()) {
                LocalDate departureDate = rs.getDate("departure_date").toLocalDate();
                LocalDate currentDate = LocalDate.now();
                
                if (departureDate.isBefore(currentDate.plusDays(30))) {
                    System.out.println("Cancellation not allowed within 30 days of departure.");
                    return;
                }
                
                try (PreparedStatement deleteStmt = conn.prepareStatement(deleteSql)) {
                    deleteStmt.setInt(1, bookingId);
                    int rowsDeleted = deleteStmt.executeUpdate();
                    if (rowsDeleted > 0) {
                        System.out.println("Booking cancelled successfully.");
                    } else {
                        System.out.println("Booking not found.");
                    }
                }
            } else {
                System.out.println("Booking not found.");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public static void main(String[] args) {
        cancelBooking(1); // Example cancellation attempt
    }
}
