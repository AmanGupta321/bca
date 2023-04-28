import java.awt.*;
import java.awt.event.*;
import java.sql.*;
import javax.swing.*;

class slip25Q1b extends JFrame implements ActionListener {
    JTextField textField, output;
    JLabel label;
    JButton create, alter, drop;

    slip25Q1b() {
        super("Chat Client");
        setVisible(true);
        setSize(500, 500);
        setBackground(Color.RED);
        setLayout(new FlowLayout());
        label = new JLabel("Enter Your DDL Query Here : ");
        textField = new JTextField(40);
        output = new JTextField(40);
        output.setEditable(false);
        create = new JButton("Create");
        alter = new JButton("Alter");
        drop = new JButton("drop");
        create.addActionListener(this);
        alter.addActionListener(this);
        drop.addActionListener(this);
        add(label);
        add(textField);
        add(create);
        add(alter);
        add(drop);
        add(output);
    }

    public void actionPerformed(ActionEvent a) {
        try {
            Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
            Connection con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
            Statement st = con.createStatement();

            String query = textField.getText();
            if(a.getSource() == create){
                st.executeUpdate(query);
                output.setText("Table Created");
            }

            if(a.getSource() == alter){
                st.executeUpdate(query);
                output.setText("Table Altered Successfully");
            }

            if(a.getSource() == drop){
                st.executeUpdate(query);
                output.setText("Table Dropped Successfully");
            }
        } catch (Exception e) {

        }


    }

    public static void main(String arg[]) {
        new slip25Q1b();
    }
}