INSERT INTO notifications (user_id, name, message)
SELECT userID, 'TravelWizard Admin', 'Welcome to your TravelWizard mail! All messages from the team will be here!'
FROM users;
ALTER TABLE contactusrequests ADD COLUMN response TEXT;
ALTER TABLE contactusrequests ADD COLUMN user_id INT;