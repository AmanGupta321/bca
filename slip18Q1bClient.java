import java.io.*;
import java.net.*;
import java.util.Scanner;

public class slip18Q1bClient {
    public static void main(String[] args) throws Exception {
        System.out.println("I am Client");
        Socket socket = new Socket("localhost", 10001); // Connect to server on port 10001

        // 2nd Receiving data from Server
        DataInputStream dis = new DataInputStream(socket.getInputStream());

        // 3rd Sending data from Client
        DataOutputStream dout = new DataOutputStream(socket.getOutputStream());

        while(true){
            String str = dis.readUTF();

                System.out.println("Server : "+str);

                System.out.print("Client : ");
                Scanner sc = new Scanner(System.in);
                dout.writeUTF(sc.nextLine());
        }
    }
}