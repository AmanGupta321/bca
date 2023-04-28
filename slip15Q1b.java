import java.sql.*;
import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
public class slip15Q1b extends JFrame implements ActionListener
{

        JLabel l1, l2, l3;
        JTextField trno, tname, tper;
        JButton b;
        ResultSet rs;
        Connection con;
        PreparedStatement pst;
        slip15Q1b(){
            setVisible(true);
            setSize(500,500);
            setLayout(new FlowLayout());
            l1 = new JLabel("Roll No");
            l2 = new JLabel("Name");
            l3 = new JLabel("Per");
            trno = new JTextField(20);
            tname = new JTextField(20);
            tper = new JTextField(20);
            b = new JButton("Insert Record");
            add(l1);
            add(trno);
            add(l2);
            add(tname);
            add(l3);
            add(tper);
            add(b);
            b.addActionListener(this);

            try{
                Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
                con = DriverManager.getConnection("jdbc:odbc:amanjavadb");
            }
            catch(Exception e){ }

        }

    public void actionPerformed(ActionEvent a){
        try {
            pst = con.prepareStatement("Insert into students values(?,?,?)");
        pst.setInt(1,Integer.parseInt(trno.getText()));  //id
        pst.setString(2, tname.getText());  //name
        pst.setInt(3,Integer.parseInt(trno.getText()));  //class
        pst.setString(4,tper.getText());  //address
        pst.executeUpdate();
        JOptionPane.showMessageDialog(null, "Table Inserted");
        } catch (Exception e) {

        }

    }


    public static void main(String[] args)throws Exception {
      new slip15Q1b();

    }

}