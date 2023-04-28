import java.net.*;
import java.util.Scanner;
import java.io.*;

public class slip14Q1bClient {
    public static void main(String[] args)throws Exception {
        Socket s = new Socket("localhost", 3333);
        System.out.println("Enter the Extension name to Search : ");
        Scanner sc = new Scanner(System.in);
        String str = sc.next();
        DataOutputStream dout = new DataOutputStream(s.getOutputStream());
        dout.writeUTF(""+str);
    }
}