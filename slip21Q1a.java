public class slip21Q1a {
    public static void main(String[] args) {
        Thread t = Thread.currentThread();
        System.out.println("Thread name: " + t.getName());
        System.out.println("Thread priority: " + t.getPriority());
    }
}
