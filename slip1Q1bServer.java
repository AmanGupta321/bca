import java.net.*;
import java.io.*;

public class slip1Q1bServer {
    public static void main(String[] args) throws IOException {
        ServerSocket serverSocket = new ServerSocket(8808);
        System.out.println("Server started.");
        while (true) {
            Socket s = serverSocket.accept();
            DataInputStream din = new DataInputStream(s.getInputStream());
                String msg = din.readUTF();
                System.out.println("Client : "+msg);
            if(msg.equals("exit")){
                break;
            }
        }
    }
}
