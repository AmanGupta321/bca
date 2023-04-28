import java.net.*;
import java.io.*;

public class slip22client {

    public static void main(String[] args) throws IOException {
        // Create client socket
        Socket socket = new Socket("localhost", 4444);

        // Receive date and time from server
        BufferedReader in = new BufferedReader(new InputStreamReader(socket.getInputStream()));
        String dateTime = in.readLine();

        // Display date and time
        System.out.println("Date and Time on server machine: " + dateTime);

        // Close socket
        socket.close();
    }
}