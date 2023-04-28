import java.net.*;
import java.io.*;

public class slip22Q1aClient {
    public static void main(String[] args)throws Exception {
        Socket s = new Socket("localhost", 4444);
        DataInputStream din = new DataInputStream(s.getInputStream());
        System.out.println(""+din.readUTF());
    }
}
