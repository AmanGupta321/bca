import java.applet.*;
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
public class slip8Q1b extends Applet implements Runnable{
    JTextField tf;
    Thread t;
    int h,m,s;
    public void init(){
        setLayout(new FlowLayout());
        tf = new JTextField(20);
        add(tf);
        t=new Thread(this);
        t.start();
        h=0;
        m=0;
        s=0;
    }
    public void run(){
        try {
            while (true) {
                tf.setText(""+h+":"+m+":"+s);
                s=s+1;
                if(s>=60){
                    m=m+1;
                    s=0;
                }
                if(m>=60){
                    h=h+1;
                    m=0;
                }
                if(h>=12){
                    h=0;
                }
                Thread.sleep(100);
            }
        } catch (Exception e) { }
    }
}
