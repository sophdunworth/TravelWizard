import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class TripsPage {
    private static final String URL = //"jdbc:mysql://localhost:3306/travel_db";
    private static final String USER = "root";
    private static final String PASSWORD = "password";

    public static List<String> fetchTrips(String sortBy) {
        List<String> trips = new ArrayList<>();
        String sql = "SELECT name, location, price, rating FROM trips ORDER BY " + sortBy;

        try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD);
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {
            
            while (rs.next()) {
                String trip = "Name: " + rs.getString("name") + ", Location: " + rs.getString("location") + ", Price: $" + rs.getDouble("price") + ", Rating: " + rs.getDouble("rating");
                trips.add(trip);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return trips;
    }

    public static void displayInfo(int tripId) {
        String sql = "SELECT * FROM trips WHERE id = ?";

        try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD);
             PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, tripId);
            ResultSet rs = pstmt.executeQuery();
            
            if (rs.next()) {
                System.out.println("Trip ID: " + rs.getInt("id"));
                System.out.println("Name: " + rs.getString("name"));
                System.out.println("Location: " + rs.getString("location"));
                System.out.println("Price: $" + rs.getDouble("price"));
                System.out.println("Rating: " + rs.getDouble("rating"));
                System.out.println("Description: " + rs.getString("description"));
            } else {
                System.out.println("Trip not found.");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public static void main(String[] args) {
        List<String> trips = fetchTrips("price"); // Example sorting by price
        for (String trip : trips) {
            System.out.println(trip);
        }
        
        System.out.println("\nDisplaying details for Trip ID 1:");
        displayInfo(1);
    }
}
