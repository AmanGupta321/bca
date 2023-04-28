public class slip21Q1a_type2 implements Runnable {
    public void run() {
        System.out.println("Thread name: " + Thread.currentThread().getName());
        System.out.println("Thread priority: " + Thread.currentThread().getPriority());
    }

    public static void main(String[] args) {
        slip21Q1a_type2 obj = new slip21Q1a_type2();
        Thread t = new Thread(obj);
        t.setName("MyThread");
        t.setPriority(Thread.MAX_PRIORITY);
        t.start();
    }
}
