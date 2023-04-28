import java.net.*;
import java.util.*;
import java.io.*;
public class slip25Q1aServer {
    public static void main(String[] args) throws Exception{
        ServerSocket sc = new ServerSocket(3333);
        Socket s = sc.accept();
        DataInputStream din = new DataInputStream(s.getInputStream());
        int num = Integer.parseInt(din.readUTF());
        String factors = "";
        for(int i=1;i<num;i++){
            if(num%i==0){
                factors = factors + "\t" +i;
            }
        }
        DataOutputStream dout = new DataOutputStream(s.getOutputStream());
        dout.writeUTF(""+ factors);        
    }
}