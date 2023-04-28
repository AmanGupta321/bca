import java.net.*;

public class slip11Q1a {
    public static void main(String[] args) {
        try {
            InetAddress ipAddress = InetAddress.getLocalHost();
            String name = ipAddress.getHostName();
            String address = ipAddress.getHostAddress();
            System.out.println("Name: " + name);
            System.out.println("IP Address: " + address);
        } catch (Exception e) {
            System.err.println("Unable to determine local host information.");
        }
    }
}
