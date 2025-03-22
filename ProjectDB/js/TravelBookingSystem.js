import java.sql.*;
import java.util.Scanner;

public class TravelBookingSystem {
    private static final String URL = //"jdbc:mysql://localhost:3306/travel_db";
    private static final String USER = "root";
    private static final String PASSWORD = "password";

    public static void main(String[] args) {
        try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD)) {
            createTables(conn);
            Scanner scanner = new Scanner(System.in);

            while (true) {
                System.out.println("1. Search Destination");
                System.out.println("2. Book Trip");
                System.out.println("3. Manage Trips");
                System.out.println("4. View Trip History");
                System.out.println("5. Exit");
                System.out.print("Choose an option: ");
                int choice = scanner.nextInt();
                scanner.nextLine();

                switch (choice) {
                    case 1:
                        searchDestination(conn, scanner);
                        break;
                    case 2:
                        bookTrip(conn, scanner);
                        break;
                    case 3:
                        manageTrips(conn, scanner);
                        break;
                    case 4:
                        viewTripHistory(conn, scanner);
                        break;
                    case 5:
                        System.out.println("Exiting...");
                        return;
                    default:
                        System.out.println("Invalid choice.");
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    private static void createTables(Connection conn) throws SQLException {
        String sql = "CREATE TABLE IF NOT EXISTS trips ("
                   + "id INT AUTO_INCREMENT PRIMARY KEY, "
                   + "user_id INT NOT NULL, "
                   + "destination VARCHAR(255) NOT NULL, "
                   + "status VARCHAR(20) NOT NULL DEFAULT 'booked')";
        try (Statement stmt = conn.createStatement()) {
            stmt.execute(sql);
        }
    }

    private static void searchDestination(Connection conn, Scanner scanner) throws SQLException {
        System.out.print("Enter destination keyword: ");
        String query = scanner.nextLine();

        String sql = "SELECT * FROM trips WHERE destination LIKE ?";
        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, "%" + query + "%");
            ResultSet rs = pstmt.executeQuery();
            while (rs.next()) {
                System.out.println("ID: " + rs.getInt("id") + ", Destination: " + rs.getString("destination") + ", Status: " + rs.getString("status"));
            }
        }
    }

    private static void bookTrip(Connection conn, Scanner scanner) throws SQLException {
        System.out.print("Enter user ID: ");
        int userId = scanner.nextInt();
        scanner.nextLine();
        System.out.print("Enter destination: ");
        String destination = scanner.nextLine();

        String sql = "INSERT INTO trips (user_id, destination, status) VALUES (?, ?, 'booked')";
        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, userId);
            pstmt.setString(2, destination);
            pstmt.executeUpdate();
            System.out.println("Trip booked successfully.");
        }
    }

    private static void manageTrips(Connection conn, Scanner scanner) throws SQLException {
        System.out.print("Enter user ID: ");
        int userId = scanner.nextInt();
        scanner.nextLine();

        String sql = "SELECT * FROM trips WHERE user_id = ?";
        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, userId);
            ResultSet rs = pstmt.executeQuery();
            while (rs.next()) {
                System.out.println("ID: " + rs.getInt("id") + ", Destination: " + rs.getString("destination") + ", Status: " + rs.getString("status"));
            }
        }

        System.out.print("Enter trip ID to cancel: ");
        int tripId = scanner.nextInt();
        cancelTrip(conn, tripId);
    }

    private static void cancelTrip(Connection conn, int tripId) throws SQLException {
        String sql = "UPDATE trips SET status = 'cancelled' WHERE id = ?";
        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, tripId);
            int rowsUpdated = pstmt.executeUpdate();
            if (rowsUpdated > 0) {
                System.out.println("Trip cancelled successfully.");
            } else {
                System.out.println("Trip ID not found.");
            }
        }
    }

    private static void viewTripHistory(Connection conn, Scanner scanner) throws SQLException {
        System.out.print("Enter user ID: ");
        int userId = scanner.nextInt();

        String sql = "SELECT * FROM trips WHERE user_id = ?";
        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, userId);
            ResultSet rs = pstmt.executeQuery();
            while (rs.next()) {
                System.out.println("ID: " + rs.getInt("id") + ", Destination: " + rs.getString("destination") + ", Status: " + rs.getString("status"));
            }
        }
    }
}
