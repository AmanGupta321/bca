import java.net.*;
import java.io.*;
import java.util.*;

public class slip25Q1aClient {
    public static void main(String[] args) throws Exception{
        Socket s = new Socket("localhost", 3333);
        System.out.println("Enter a number to get factors: ");
        Scanner sc = new Scanner(System.in);
        int str = sc.nextInt();
        DataOutputStream dout = new DataOutputStream(s.getOutputStream());
        dout.writeUTF(""+str);
        DataInputStream din = new DataInputStream(s.getInputStream());
        System.out.println(""+din.readUTF());
    }
}
