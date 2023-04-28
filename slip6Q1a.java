import java.awt.*;
import javax.swing.*;
class BlinkFrame extends JFrame implements Runnable{
    JLabel l;
    boolean flag = true;
    Thread t;
    BlinkFrame(){
        setVisible(true);
        setSize(500,500);
        setLayout(new FlowLayout());
        l = new JLabel(new ImageIcon("img1.jpg"));
        add(l);
        t=new Thread(this);
        t.start();
    }
    public void run(){
        try {
            while (true) {
                if(flag==true){
                    l.setVisible(false);
                    flag=false;
                }
                else{
                    l.setVisible(true);
                    flag=true;
                }
                Thread.sleep(100);
            }
        } catch (Exception e) {
            // TODO: handle exception
        }
    }
}
public class slip6Q1a{
    public static void main(String[] args) {
        new BlinkFrame();
    }
}