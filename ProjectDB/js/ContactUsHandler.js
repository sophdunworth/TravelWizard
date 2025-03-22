import java.io.*;
import java.util.*;
import javax.mail.*;
import javax.mail.internet.*;

public class AutoResponder {
    // Constants for email, password, and IMAP server configuration
    private static final String EMAIL = "support@travelwizard.com";
    private static final String PASSWORD = "your-email-password"; // replace with your actual email password
    private static final String HOST = "imap.yourmailserver.com"; // IMAP host (example: imap.gmail.com for Gmail)

    public static void main(String[] args) {
        try {
            // Set properties for the IMAP session (secure connection using IMAPS protocol)
            Properties props = new Properties();
            props.put("mail.store.protocol", "imaps");
            Session session = Session.getDefaultInstance(props, null);
            
            // Connect to the mail server and authenticate using email and password
            Store store = session.getStore("imaps");
            store.connect(HOST, EMAIL, PASSWORD);

            // Access the inbox folder
            Folder inbox = store.getFolder("INBOX");
            inbox.open(Folder.READ_WRITE); // Open inbox in read-write mode

            // Retrieve all messages from the inbox
            Message[] messages = inbox.getMessages();
            for (Message message : messages) {
                // Check if the message is unread (not marked as seen)
                if (!message.isSet(Flags.Flag.SEEN)) {
                    // Extract the sender's email address from the "From" field
                    String senderEmail = ((InternetAddress) message.getFrom()[0]).getAddress();
                    System.out.println("New email from: " + senderEmail);
                    
                    // Read the auto-response message from the external text file
                    String autoResponse = readAutoResponse();
                    
                    // Send an automated response to the sender
                    sendEmail(senderEmail, "Re: " + message.getSubject(), autoResponse);
                    
                    // Mark the email as read (set the SEEN flag)
                    message.setFlag(Flags.Flag.SEEN, true);
                }
            }

            // Close the inbox and store connections
            inbox.close(false); // Don't expunge deleted messages
            store.close(); // Close the connection to the mail server
        } catch (Exception e) {
            // Print any exceptions for debugging purposes
            e.printStackTrace();
        }
    }

    // Method to read the auto-response message from a text file
    private static String readAutoResponse() {
        try (BufferedReader br = new BufferedReader(new FileReader("response.txt"))) {
            // Read the file line by line and append each line to a StringBuilder
            StringBuilder response = new StringBuilder();
            String line;
            while ((line = br.readLine()) != null) {
                response.append(line).append("\n"); // Add line and newline
            }
            return response.toString(); // Return the entire response
        } catch (IOException e) {
            // In case of an error reading the file, return a default response
            e.printStackTrace();
            return "Thank you for reaching out! We will get back to you soon.";
        }
    }

    // Method to send an automated response email to the recipient
    private static void sendEmail(String recipient, String subject, String body) {
        try {
            // Set properties for the SMTP session (secure connection using TLS)
            Properties props = new Properties();
            props.put("mail.smtp.host", "smtp.yourmailserver.com"); // SMTP server host
            props.put("mail.smtp.auth", "true"); // Enable authentication
            props.put("mail.smtp.starttls.enable", "true"); // Enable TLS

            // Create a session with authentication using the email and password
            Session session = Session.getInstance(props, new Authenticator() {
                protected PasswordAuthentication getPasswordAuthentication() {
                    return new PasswordAuthentication(EMAIL, PASSWORD);
                }
            });

            // Create a MimeMessage object (representing the email)
            Message message = new MimeMessage(session);
            message.setFrom(new InternetAddress(EMAIL)); // Set the sender's email
            message.setRecipients(Message.RecipientType.TO, InternetAddress.parse(recipient)); // Set recipient's email
            message.setSubject(subject); // Set the email subject
            message.setText(body); // Set the body of the email

            // Send the email via the SMTP server
            Transport.send(message);
            System.out.println("Automated response sent to: " + recipient);
        } catch (MessagingException e) {
            // Print any errors while sending the email
            e.printStackTrace();
        }
    }
}


