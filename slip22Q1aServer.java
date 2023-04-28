import java.net.*;
import java.io.*;
import java.util.*;

public class slip22Q1aServer {

    public static void main(String[] args) throws Exception {
        // Create server socket
        ServerSocket serverSocket = new ServerSocket(4444);

        // Wait for client connection
        System.out.println("Waiting for client connection...");
        Socket clientSocket = serverSocket.accept();

        // Get date and time
        Date date = new Date();
        String dateTime = date.toString();

        // Send date and time to client
        DataOutputStream dout = new DataOutputStream(clientSocket.getOutputStream());
        dout.writeUTF(dateTime);

        // Close socket
        clientSocket.close();
        serverSocket.close();
    }
}