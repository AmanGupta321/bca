import java.net.*;
import java.util.*;
import java.io.*;
public class slip3Q1aServer {
    public static void main(String[] args) {
        ServerSocket serversocket = null;
        Socket serSocket = null;
        try {
           serversocket = new ServerSocket(8888);
           serSocket = serversocket.accept();
           DataInputStream din = new DataInputStream(serSocket.getInputStream());
           int num = Integer.parseInt(din.readUTF());
           String out = "";
           boolean flag = false;
           if(num==0 || num==1){
              flag = true;
           }
           for(int i=2;i<=(num/2);i++){
              if(num%i==0){
                  flag = true;
                  break;
              }
           }
           if(flag == false){
              out = num + " is a Prime Number";
          }
          else{
              out = num + " is not a Prime Number";
           }
           DataOutputStream dout = new DataOutputStream(serSocket.getOutputStream());
           dout.writeUTF(""+out);
        } catch (IOException e) {
           System.err.println("Could not listen on port: 8888.");
           System.exit(1);
        }
    }
}
