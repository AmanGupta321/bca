class msg {
    synchronized void dis(){
        for(int i=1;i<=10;i++){
      System.out.println("5x"+i+"="+i*5);
        }
    }

    synchronized void disp(){
        for(int i=1;i<=10;i++){
    System.out.println("10x"+i+"="+i*10);
        }
    }
}

class Demo1 implements Runnable{
    msg m;
    Demo1(msg m1){
        m = m1;
        Thread t = new Thread(this);
        t.start();
    }

    public void run(){
        m.dis();      
    }
}


class Demo2 implements Runnable{
    msg m;
    Demo2(msg m1){
        m = m1;
        Thread t = new Thread(this);
        t.start();
    }

    public void run(){
        m.disp();
    }
}

class slip28Q1a{

    public static void main(String args[]){
        msg mg = new msg();
        new Demo1(mg);
        new Demo2(mg);
    }
}