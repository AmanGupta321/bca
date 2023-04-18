import java.util.Arrays;
import java.util.Collections;
import java.util.List;
import java.awt.Color;
import java.util.Random;
import javax.swing.JOptionPane;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JFrame.java to edit this template
 */

/**
 *
 * @author Hp
 */
public class colorg extends javax.swing.JFrame {
    void optionmethod(){
    Integer[] arr = {0, 1 ,2};
/*    for (Integer res: arr) {
       System.out.print(res + " ");
    }*/
    List<Integer>list = Arrays.asList(arr);
    Collections.shuffle(list);
     String [] textcolor = {"red", "green", "blue", "yellow", "orange", "white", "black", "pink"};
     textcolor[0] = answer;
     if(shuffleoptionvalues[0] == answer){
        correctrbtn = 0;
     }
     if(shuffleoptionvalues[1] == answer){
        correctrbtn = 1;
     }
     if(shuffleoptionvalues[2] == answer){
        correctrbtn = 2;
     }
     
    for (Integer res: list) {
       shuffleoptionvalues[res] = textcolor[res];
    }
}


        void mymethod(){
            int i = 1;
            
            
            String [] color = {"red", "green", "blue", "yellow","orange", "white", "black", "pink"};
            System.out.println(userinput);
            if(userinput.toLowerCase().equals(answer))
            {
            JOptionPane.showMessageDialog(null, "YEY!! Your Guess is Correct", "Correct", JOptionPane.INFORMATION_MESSAGE);  
            score++;
            textcolornum++;
            bordcolornum++;
            backcolornum++;
            this.setVisible(false);
            }
            else{
                JOptionPane.showMessageDialog(null, "OOPS! Wrong Guess...", "Incorrect", JOptionPane.ERROR_MESSAGE);  
                chance--;
                exitgame();
                textcolornum++;
                bordcolornum++;
                backcolornum++;
                this.setVisible(false);
   
            
            }
            
        }
        void exitgame(){
            if(chance==0){
                String scoreboard = "Your Score is : " + score+"\nThank You For Playing";
                JOptionPane.showMessageDialog(null, scoreboard,"Game Over", JOptionPane.INFORMATION_MESSAGE);  
                System.exit(0); 
            }
        }
        void reconstruct(){
            
            op1.setText(null);
            op2.setText(null);
            op3.setText(null);
            scoreb.setText(Integer.toString(score));
            
            
            
        Random rd = new Random();
        String [] words = {"bLAck","rEd", "orAnGe" ,"bLUe","wHitE", "gReEn","yelLOw"};        
        String [] qs = {"Enter text color","Enter border color", "Enter background color"};
        int randomqsvalue = rd.nextInt(qs.length);
        Object[] textco = new Object[] {Color.red, Color.green, Color.blue, Color.yellow, Color.orange, Color.white, Color.black, Color.PINK};
        String [] textcolor = {"red", "green", "blue", "yellow", "orange", "white", "black", "pink"};
        Object[] back = new Object[] {Color.yellow, Color.pink, Color.orange,  Color.blue, Color.red, Color.green, Color.white, Color.black};
        String [] backcolor = {"yellow", "pink", "orange", "blue","red","green","white", "black",};
        Object[] bord = new Object[] {Color.green, Color.yellow, Color.red,  Color.pink, Color.blue, Color.black, Color.orange, Color.white};
        String [] bordcolor = {"green", "yellow", "red", "pink","blue","black","orange","white"};
        
        
            
            
        
        if(textcolornum==8){
          textcolornum = 0;
          bordcolornum = 0;
          
          backcolornum = 0;
         }
            switch (randomqsvalue) {
                case 0:
                    answer = ""+textcolor[textcolornum];
                    break;
                case 1:
                    answer = ""+bordcolor[bordcolornum];
                    break;
                default:
                    answer = ""+backcolor[backcolornum];
                    break;
            }
            
        
        Qs.setText(qs[randomqsvalue]);
        display.setBackground((Color) back[backcolornum]);
        display.setBorder(javax.swing.BorderFactory.createLineBorder((Color) bord[bordcolornum], 4));
        display.setForeground((Color) textco[textcolornum]);
        display.setText(words[rd.nextInt(words.length)]);
        Live.setText(Integer.toString(chance));
        optionmethod();
        op1.setText(shuffleoptionvalues[0]);
        op2.setText(shuffleoptionvalues[1]);
        op3.setText(shuffleoptionvalues[2]);
        }
        
        /**
     * Creates new form NewJFrame
     */
    public colorg() {
        initComponents();
        
        
            JOptionPane.showMessageDialog(null , "Welcome to Game of Colors...", "Color Hunt", JOptionPane.INFORMATION_MESSAGE);  
            JOptionPane.showMessageDialog(null , "1. Enter the Color of the text in the input field below without any whitespaces.\n2. You have only 3 Lives to Play.\n3. Score : +1 for every correct answer.\nThank YOU for reading me :)", "Rules", JOptionPane.INFORMATION_MESSAGE);  
            JOptionPane.showMessageDialog(null , "||| Best of Luck |||", "", JOptionPane.INFORMATION_MESSAGE);  
        
        reconstruct();
    }
    

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        gp1 = new javax.swing.ButtonGroup();
        jPanel1 = new javax.swing.JPanel();
        display = new javax.swing.JLabel();
        jButton1 = new javax.swing.JButton();
        Live = new javax.swing.JLabel();
        scoreb = new javax.swing.JLabel();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        exit = new javax.swing.JButton();
        jLabel3 = new javax.swing.JLabel();
        Qs = new javax.swing.JLabel();
        op1 = new javax.swing.JRadioButton();
        op2 = new javax.swing.JRadioButton();
        op3 = new javax.swing.JRadioButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Color Hunt");

        jPanel1.setBackground(new java.awt.Color(204, 255, 204));
        jPanel1.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createMatteBorder(4, 4, 4, 4, new java.awt.Color(0, 102, 102)), "Game", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("HP Simplified", 1, 14))); // NOI18N
        jPanel1.setPreferredSize(new java.awt.Dimension(232, 316));

        display.setBackground(new java.awt.Color(51, 51, 51));
        display.setFont(new java.awt.Font("Comic Sans MS", 1, 20)); // NOI18N
        display.setForeground(new java.awt.Color(255, 51, 0));
        display.setText("jLabel1");
        display.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(204, 0, 255), 3));
        display.setOpaque(true);

        jButton1.setFont(new java.awt.Font("Comic Sans MS", 1, 22)); // NOI18N
        jButton1.setText("Check");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        Live.setBackground(new java.awt.Color(102, 255, 102));
        Live.setFont(new java.awt.Font("Comic Sans MS", 1, 18)); // NOI18N
        Live.setForeground(new java.awt.Color(255, 0, 0));
        Live.setText("LIVES");

        scoreb.setFont(new java.awt.Font("Comic Sans MS", 1, 18)); // NOI18N
        scoreb.setForeground(new java.awt.Color(0, 102, 0));
        scoreb.setText("jLabel1");

        jLabel1.setFont(new java.awt.Font("Comic Sans MS", 1, 18)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(51, 51, 51));
        jLabel1.setText("Score");

        jLabel2.setFont(new java.awt.Font("Comic Sans MS", 1, 18)); // NOI18N
        jLabel2.setForeground(new java.awt.Color(51, 51, 51));
        jLabel2.setText("Lives");

        exit.setFont(new java.awt.Font("Comic Sans MS", 1, 22)); // NOI18N
        exit.setText("Exit");
        exit.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                exitActionPerformed(evt);
            }
        });

        jLabel3.setFont(new java.awt.Font("Comic Sans MS", 1, 18)); // NOI18N
        jLabel3.setForeground(new java.awt.Color(51, 51, 51));
        jLabel3.setText("Word :");

        Qs.setFont(new java.awt.Font("Comic Sans MS", 1, 18)); // NOI18N
        Qs.setForeground(new java.awt.Color(51, 51, 51));
        Qs.setText("jLabel4");
        Qs.setName("Qs"); // NOI18N

        gp1.add(op1);
        op1.setFont(new java.awt.Font("Comic Sans MS", 1, 18)); // NOI18N
        op1.setForeground(new java.awt.Color(51, 51, 51));
        op1.setText("jRadioButton1");

        gp1.add(op2);
        op2.setFont(new java.awt.Font("Comic Sans MS", 1, 18)); // NOI18N
        op2.setForeground(new java.awt.Color(51, 51, 51));
        op2.setText("jRadioButton2");

        gp1.add(op3);
        op3.setFont(new java.awt.Font("Comic Sans MS", 1, 18)); // NOI18N
        op3.setForeground(new java.awt.Color(51, 51, 51));
        op3.setText("jRadioButton3");

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addContainerGap(5, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(jButton1)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(exit))
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(jPanel1Layout.createSequentialGroup()
                            .addGap(20, 20, 20)
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                .addComponent(jLabel1)
                                .addComponent(scoreb, javax.swing.GroupLayout.PREFERRED_SIZE, 34, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGap(81, 81, 81)
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                .addComponent(jLabel2)
                                .addComponent(Live, javax.swing.GroupLayout.PREFERRED_SIZE, 29, javax.swing.GroupLayout.PREFERRED_SIZE)))
                        .addGroup(jPanel1Layout.createSequentialGroup()
                            .addGap(21, 21, 21)
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addGroup(jPanel1Layout.createSequentialGroup()
                                    .addComponent(jLabel3)
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                    .addComponent(display, javax.swing.GroupLayout.PREFERRED_SIZE, 104, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addComponent(Qs, javax.swing.GroupLayout.PREFERRED_SIZE, 181, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGroup(jPanel1Layout.createSequentialGroup()
                                    .addGap(13, 13, 13)
                                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                        .addComponent(op1, javax.swing.GroupLayout.PREFERRED_SIZE, 160, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addComponent(op2, javax.swing.GroupLayout.PREFERRED_SIZE, 160, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addComponent(op3, javax.swing.GroupLayout.PREFERRED_SIZE, 160, javax.swing.GroupLayout.PREFERRED_SIZE)))))))
                .addContainerGap(25, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(24, 24, 24)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(jLabel2))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(scoreb, javax.swing.GroupLayout.PREFERRED_SIZE, 36, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(Live, javax.swing.GroupLayout.PREFERRED_SIZE, 36, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(13, 13, 13)
                .addComponent(Qs)
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 32, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(display))
                .addGap(26, 26, 26)
                .addComponent(op1)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(op2)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(op3)
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButton1)
                    .addComponent(exit))
                .addGap(0, 22, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, 243, javax.swing.GroupLayout.PREFERRED_SIZE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, 428, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
         if(chance==0){
                    JOptionPane.showMessageDialog(null, "Game Over");  
                System.exit(0);}
         
         mymethod();
         this.setVisible(true);
         reconstruct();
    }//GEN-LAST:event_jButton1ActionPerformed

    private void exitActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_exitActionPerformed
            System.exit(0);
    }//GEN-LAST:event_exitActionPerformed

    /**
     * @param args the command line arguments
     */
    static int chance = 3;
    static int count = 0;
    static int score = 0;
    static int randomvalue = 0;
    static int randomqsvalue = 0;
    static String answer = "";
    static int correctrbtn = 0;
    static String [] shuffleoptionvalues = new String[3];
    static int textcolornum = 0;
    static int bordcolornum = 0;
    static int backcolornum = 0;
    public static void main(String args[]) {
        
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(colorg.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(colorg.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(colorg.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(colorg.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new colorg().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel Live;
    private javax.swing.JLabel Qs;
    private javax.swing.JLabel display;
    private javax.swing.JButton exit;
    private javax.swing.ButtonGroup gp1;
    private javax.swing.JButton jButton1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JRadioButton op1;
    private javax.swing.JRadioButton op2;
    private javax.swing.JRadioButton op3;
    private javax.swing.JLabel scoreb;
    // End of variables declaration//GEN-END:variables
}
