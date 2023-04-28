import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class slip7Q1b extends JFrame implements ActionListener, Runnable {
    private JTextField textField;
    private JButton startButton;
    int i = 1;

    public slip7Q1b() {
        super("Number Display");
        setLayout(new FlowLayout());
        setVisible(true);
        textField = new JTextField(20);
        startButton = new JButton("Start");
        add(textField);
        add(startButton);
        textField.setEditable(false);
        startButton.addActionListener(this);
    }

    public void actionPerformed(ActionEvent event) {
        Thread t = new Thread(this);
        t.start();
    }

    public void run() {
        try {
            while(true){
                textField.setText(""+i);
                i+=1;
                if(i==100){
                    i=1;
                }
                Thread.sleep(1000);
            }
        } catch (Exception e) {
            textField.setText("Error");
        }
    }
    public static void main(String[] args) {
        new slip7Q1b();
    }
}
