import java.util.Scanner;
public class slip17Q1A extends Thread {
    public void run(){
        System.out.println("Enter the String : ");
        Scanner sc = new Scanner(System.in);
        String str = sc.nextLine();
        char cvalue;
        for(int i=0; i<str.length(); i++){
            cvalue = str.charAt(i);
            if(cvalue == 'a'||cvalue == 'e'||cvalue=='i'||cvalue=='o'||cvalue=='u'){
                try {
                    Thread.sleep(3000);
                    System.out.println(cvalue);

                } catch (Exception e) {  }

            }
        }
    }
    public static void main(String[] args) {
        slip17Q1A sT = new slip17Q1A();
        sT.start();

    }
}
