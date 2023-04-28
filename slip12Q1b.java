import java.util.Random;

class slip12Q1b extends Thread {
    private String threadName;

    public slip12Q1b(String name) {
        threadName = name;
    }

    public void run() {
        Random rand = new Random();
        int sleepTime = rand.nextInt(5000);
        System.out.println(threadName + " sleeping for " + sleepTime + " ms.");
        try {
            Thread.sleep(sleepTime);
        } catch (InterruptedException e) {
            System.out.println(threadName + " interrupted.");
        }
        System.out.println(threadName + " finished.");
    }

    public static void main(String[] args) {
        slip12Q1b t = new slip12Q1b("slip12Q1b");
        System.out.println(t.getName() + " created.");
        t.start();
        try {
            t.join();
        } catch (InterruptedException e) {
            System.out.println("Main thread interrupted.");
        }
        System.out.println(t.getName() + " dead.");
    }
}