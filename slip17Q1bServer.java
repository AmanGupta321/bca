import java.util.*;
import java.net.*;
import java.io.*;
public class slip17Q1bServer {
    public static void main(String[] args) throws Exception{
        ServerSocket sk = new ServerSocket(3333);
        Socket s = sk.accept();
        DataInputStream din = new DataInputStream(s.getInputStream());
        String n = din.readUTF();
        String d = "";
        int ch;
        try {
            FileInputStream fin = new FileInputStream("C:\\Users\\Hp\\Desktop\\TY Java Practicals\\"+n);
            System.out.println(""+fin);
            while((ch=fin.read())!=-1){
                d=d+(char)ch;
            }
            DataOutputStream dout = new DataOutputStream(s.getOutputStream());
            dout.writeUTF(""+d);
        } catch (Exception e) {
            DataOutputStream dout = new DataOutputStream(s.getOutputStream());
            dout.writeUTF("File Not Found");
        }
    }
}
