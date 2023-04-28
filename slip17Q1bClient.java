import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.net.*;
import java.io.*;
import java.util.*;
public class slip17Q1bClient {
    public static void main(String[] args) throws Exception{
        Socket s = new Socket("localhost", 3333);
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter file name");
        String n = sc.next();
        DataOutputStream dout = new DataOutputStream(s.getOutputStream());
        dout.writeUTF(""+n);
        DataInputStream din = new DataInputStream(s.getInputStream());
        System.out.println(""+din.readUTF());
    }
}
