import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.*;
import java.io.*;
import java.net.*;

class slip1Q1bClient extends JFrame implements ActionListener {
    JTextField textField;

    slip1Q1bClient() {
        super("Chat Client");
        setVisible(true);
        setSize(500, 500);
        setBackground(Color.RED);
        setLayout(new FlowLayout());
        textField = new JTextField(40);
        JButton sendButton = new JButton("Send");
        sendButton.addActionListener(this);
        add(textField);
        add(sendButton);
    }

    public void actionPerformed(ActionEvent a) {
        String message = textField.getText();
        try {
            Socket clientsocket = new Socket("localhost", 8808);
            DataOutputStream dout = new DataOutputStream(clientsocket.getOutputStream());
            dout.writeUTF("" + message);
        } catch (IOException e) {
            System.err.println("Accept failed.");
            System.exit(1);
        }
        if (!message.equals("exit")) {
            setVisible(false);
            textField.setText("");
            setVisible(true);
            // new slip1Q1bClient();
        }
    }

    public static void main(String arg[]) {
        new slip1Q1bClient();
    }
}