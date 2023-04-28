import java.util.Scanner;

class Thread1 extends Thread {
    private int n;

    public Thread1(int n) {
        this.n = n;
    }

    public void run() {
        for (int i = 1; i <= n; i += 2) {
            System.out.println(" ODD Number : " + i);
        }
    }
}

class Thread2 extends Thread {
    private int n;

    public Thread2(int n) {
        this.n = n;
    }

    public void run() {
        for (int i = 2; i <= n; i++) {
            boolean isPrime = true;
            for (int j = 2; j <= Math.sqrt(i); j++) {
                if (i % j == 0) {
                    isPrime = false;
                    break;
                }
            }
            if (isPrime) {
                System.out.println("Prime Number : " + i);
            }
        }
    }
}

class slip29Q1a {
    public static void main(String[] args) {
        System.out.print("Enter a Number : ");
        Scanner sc = new Scanner(System.in);
        int n = sc.nextInt();
        Thread t1 = new Thread1(n);
        Thread t2 = new Thread2(n);
        t1.start();
        t2.start();
    }
}
