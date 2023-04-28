import java.net.*;
import java.util.*;
import java.io.*;

public class slip3Q1aClient {
   public static void main(String[] args) throws IOException {
    // Code to handle server connection 
      // Code to handle client connection
      Socket clientsocket = null;
      try {
         clientsocket = new Socket("localhost", 8888);
         System.out.println("Waiting for connection...");
         System.out.println("Connection accepted from: " + clientsocket.getInetAddress());
         System.out.print("Enter a Number");
         Scanner sc = new Scanner(System.in);
         DataOutputStream dout = new DataOutputStream(clientsocket.getOutputStream());
         dout.writeUTF(""+sc.nextLine());
         DataInputStream din = new DataInputStream(clientsocket.getInputStream());
         System.out.println(""+din.readUTF());
      } catch (IOException e) {
         System.err.println("Accept failed.");
         System.exit(1);
      }

      clientsocket.close();
   }
}
