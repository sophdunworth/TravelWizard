import java.sql.*;
import java.util.Scanner;
import org.mindrot.jbcrypt.BCrypt;

public class UserAuthSystem {
    private static final String URL = //"jdbc:mysql://localhost:3306/support_db";
    private static final String USER = "root";
    private static final String PASSWORD = "password";
    private static Integer loggedInUserId = null;

    public static void main(String[] args) {
        try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD)) {
            createTable(conn);
            Scanner scanner = new Scanner(System.in);
            
            while (true) {
                System.out.println("1. Register");
                System.out.println("2. Login");
                System.out.println("3. Update Account");
                System.out.println("4. Logout");
                System.out.println("5. Exit");
                System.out.print("Choose an option: ");
                int choice = scanner.nextInt();
                scanner.nextLine();
                
                switch (choice) {
                    case 1:
                        registerUser(conn, scanner);
                        break;
                    case 2:
                        loginUser(conn, scanner);
                        break;
                    case 3:
                        updateAccount(conn, scanner);
                        break;
                    case 4:
                        logoutUser();
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

    private static void createTable(Connection conn) throws SQLException {
        String sql = "CREATE TABLE IF NOT EXISTS users ("
                   + "id INT AUTO_INCREMENT PRIMARY KEY, "
                   + "email VARCHAR(255) UNIQUE NOT NULL, "
                   + "password VARCHAR(255) NOT NULL, "
                   + "preferences TEXT)";
        try (Statement stmt = conn.createStatement()) {
            stmt.execute(sql);
        }
    }

    private static void registerUser(Connection conn, Scanner scanner) throws SQLException {
        System.out.print("Enter email: ");
        String email = scanner.nextLine();
        System.out.print("Enter password: ");
        String password = scanner.nextLine();

        String hashedPassword = BCrypt.hashpw(password, BCrypt.gensalt());

        String sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, email);
            pstmt.setString(2, hashedPassword);
            pstmt.executeUpdate();
            System.out.println("User registered successfully.");
        }
    }

    private static void loginUser(Connection conn, Scanner scanner) throws SQLException {
        System.out.print("Enter email: ");
        String email = scanner.nextLine();
        System.out.print("Enter password: ");
        String password = scanner.nextLine();

        String sql = "SELECT id, password FROM users WHERE email = ?";
        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, email);
            ResultSet rs = pstmt.executeQuery();
            if (rs.next()) {
                String storedPassword = rs.getString("password");
                if (BCrypt.checkpw(password, storedPassword)) {
                    loggedInUserId = rs.getInt("id");
                    System.out.println("Login successful.");
                } else {
                    System.out.println("Invalid password.");
                }
            } else {
                System.out.println("User not found.");
            }
        }
    }

    private static void updateAccount(Connection conn, Scanner scanner) throws SQLException {
        if (loggedInUserId == null) {
            System.out.println("You must be logged in to update account details.");
            return;
        }
        
        System.out.println("1. Update Email");
        System.out.println("2. Update Password");
        System.out.println("3. Update Preferences");
        System.out.print("Choose an option: ");
        int choice = scanner.nextInt();
        scanner.nextLine();
        
        String sql = "";
        switch (choice) {
            case 1:
                System.out.print("Enter new email: ");
                String newEmail = scanner.nextLine();
                sql = "UPDATE users SET email = ? WHERE id = ?";
                try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
                    pstmt.setString(1, newEmail);
                    pstmt.setInt(2, loggedInUserId);
                    pstmt.executeUpdate();
                    System.out.println("Email updated successfully.");
                }
                break;
            case 2:
                System.out.print("Enter new password: ");
                String newPassword = scanner.nextLine();
                String hashedPassword = BCrypt.hashpw(newPassword, BCrypt.gensalt());
                sql = "UPDATE users SET password = ? WHERE id = ?";
                try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
                    pstmt.setString(1, hashedPassword);
                    pstmt.setInt(2, loggedInUserId);
                    pstmt.executeUpdate();
                    System.out.println("Password updated successfully.");
                }
                break;
            case 3:
                System.out.print("Enter new preferences: ");
                String newPreferences = scanner.nextLine();
                sql = "UPDATE users SET preferences = ? WHERE id = ?";
                try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
                    pstmt.setString(1, newPreferences);
                    pstmt.setInt(2, loggedInUserId);
                    pstmt.executeUpdate();
                    System.out.println("Preferences updated successfully.");
                }
                break;
            default:
                System.out.println("Invalid choice.");
        }
    }

    private static void logoutUser() {
        if (loggedInUserId != null) {
            loggedInUserId = null;
            System.out.println("Logged out successfully.");
        } else {
            System.out.println("No user is logged in.");
        }
    }
}
