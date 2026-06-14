package services;

public class NotificationService {

    public void sendEmail(String email, String message) {
        System.out.println("Email envoye a " + email + " : " + message);
    }
}