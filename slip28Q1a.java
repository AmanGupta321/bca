class ThreadSynchronized extends Thread{
    int n=5;
    synchronized void display(){
        for(int i=1;i<=10;i++){
            System.out.println(""+i*5);
        }
    }
    public void run(){
        try {
            display();
            Thread.sleep(1000);
        } catch (Exception e) {
            // TODO: handle exception
        }
    }
}
public class slip28Q1a {
    public static void main(String[] args) {
        ThreadSynchronized t1 = new ThreadSynchronized();
    ThreadSynchronized t2 = new ThreadSynchronized();
    t1.start();
    t2.start();
    }
}
