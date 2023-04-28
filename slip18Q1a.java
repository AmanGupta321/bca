import java.util.Scanner;

public class slip18Q1a {
    public static void main(String[] args) throws Exception {
        Scanner sc = new Scanner(System.in);
        System.out.print("Enter a number: ");
        int n = sc.nextInt();
        int factorial = 1;
        for (int i = 1; i <= n; i++) {
            factorial *= i;
            System.out.println("Calculating factorial of " + i + "...");
            Thread.sleep(1000); // sleep for 1 second (1000 milliseconds)
        }
        System.out.println("Factorial of " + n + " is " + factorial);
    }
}
