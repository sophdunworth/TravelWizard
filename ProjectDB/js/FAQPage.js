import java.sql.*;  
import java.util.ArrayList;
import java.util.List;

public class FAQPage {
    private static final String URL = //"jdbc:mysql://localhost:3306/travel_db"; 
    private static final String USER = "root";  
    private static final String PASSWORD = "password";  

    /**
     * Fetches FAQs from the database.
     * @return List of formatted FAQ strings
     */
    public static List<String> fetchFAQs() {
        List<String> faqs = new ArrayList<>();  // List to store FAQs
        String sql = "SELECT question, answer FROM faqs";  // SQL query to retrieve FAQs

        // Try-with-resources to auto-close connection, statement, and result set
        try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD);
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {
            
            // Loop through the result set and format each FAQ
            while (rs.next()) {
                String faq = "Q: " + rs.getString("question") + "\nA: " + rs.getString("answer");
                faqs.add(faq);
            }
        } catch (SQLException e) {
            e.printStackTrace();  // Print error details if a database issue occurs
        }
        return faqs;  // Return list of FAQs
    }

    /**
     * Main method for testing FAQ retrieval.
     */
    public static void main(String[] args) {
        List<String> faqs = fetchFAQs();  // Fetch FAQs from the database

        // Print each FAQ to the console
        for (String faq : faqs) {
            System.out.println(faq);
        }
    }
}
