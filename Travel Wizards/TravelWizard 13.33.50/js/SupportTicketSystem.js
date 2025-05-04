import java.sql.*;  
import java.util.Scanner; 

public class SupportTicketSystem {
    private static final String URL = //"jdbc:mysql://localhost:3306/support_db"; 
    private static final String USER = "root";  
    private static final String PASSWORD = "password";  

    public static void main(String[] args) {
        try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD)) {
            createTable(conn);  // Ensure the tickets table exists before proceeding
            Scanner scanner = new Scanner(System.in);

            while (true) {  // Infinite loop for menu-driven interaction
                System.out.println("1. Submit Ticket");
                System.out.println("2. View Tickets by Status");
                System.out.println("3. Update Ticket Status");
                System.out.println("4. Exit");
                System.out.print("Choose an option: ");
                int choice = scanner.nextInt();
                scanner.nextLine();  // Consume newline character

                switch (choice) {
                    case 1:
                        submitTicket(conn, scanner);
                        break;
                    case 2:
                        viewTicketsByStatus(conn, scanner);
                        break;
                    case 3:
                        updateTicketStatus(conn, scanner);
                        break;
                    case 4:
                        System.out.println("Exiting...");
                        return;  // Exit the program
                    default:
                        System.out.println("Invalid choice.");
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();  // Print error details if a database issue occurs
        }
    }

    /**
     * Creates the tickets table if it does not already exist.
     */
    private static void createTable(Connection conn) throws SQLException {
        String sql = "CREATE TABLE IF NOT EXISTS tickets ("
                   + "id INT AUTO_INCREMENT PRIMARY KEY, "  // Unique ID for each ticket
                   + "description TEXT NOT NULL, "  // Description of the issue
                   + "status VARCHAR(20) NOT NULL DEFAULT 'open')";  // Ticket status (default is 'open')
        try (Statement stmt = conn.createStatement()) {
            stmt.execute(sql);  // Execute the SQL command
        }
    }

    /**
     * Submits a new support ticket.
     */
    private static void submitTicket(Connection conn, Scanner scanner) throws SQLException {
        System.out.print("Enter ticket description: ");
        String description = scanner.nextLine();  // Get user input for ticket description

        String sql = "INSERT INTO tickets (description, status) VALUES (?, 'open')";  // Insert new ticket
        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, description);
            pstmt.executeUpdate();  // Execute the insert statement
            System.out.println("Ticket submitted successfully.");
        }
    }

    /**
     * Views tickets filtered by their status.
     */
    private static void viewTicketsByStatus(Connection conn, Scanner scanner) throws SQLException {
        System.out.print("Enter status (open/closed/pending): ");
        String status = scanner.nextLine();  // Get status from user

        String sql = "SELECT * FROM tickets WHERE status = ?";  // Query tickets based on status
        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, status);
            ResultSet rs = pstmt.executeQuery();  // Execute the query

            boolean hasTickets = false;
            while (rs.next()) {
                hasTickets = true;
                System.out.println("ID: " + rs.getInt("id") + ", Description: " 
                                   + rs.getString("description") + ", Status: " + rs.getString("status"));
            }
            if (!hasTickets) {
                System.out.println("No tickets found with status: " + status);
            }
        }
    }

    /**
     * Updates the status of an existing ticket.
     */
    private static void updateTicketStatus(Connection conn, Scanner scanner) throws SQLException {
        System.out.print("Enter ticket ID to update: ");
        int id = scanner.nextInt();
        scanner.nextLine();  // Consume newline

        // Check if the ticket exists before updating
        String checkSql = "SELECT COUNT(*) FROM tickets WHERE id = ?";
        try (PreparedStatement checkStmt = conn.prepareStatement(checkSql)) {
            checkStmt.setInt(1, id);
            ResultSet rs = checkStmt.executeQuery();
            if (rs.next() && rs.getInt(1) == 0) {  // If no matching ticket ID is found
                System.out.println("Ticket ID not found.");
                return;
            }
        }
        
        System.out.print("Enter new status (open/closed/pending): ");
        String status = scanner.nextLine();  // Get new status from user

        String sql = "UPDATE tickets SET status = ? WHERE id = ?";  // Update ticket status
        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, status);
            pstmt.setInt(2, id);
            pstmt.executeUpdate();  // Execute the update statement
            System.out.println("Ticket updated successfully.");
        }
    }
}
