
public class Seller2 implements Runnable {
	BoxIt2 box; 
	Paypal pay;
	

	public Seller2(BoxIt2 newBox, Paypal newPaypal){
		box = newBox;
		pay=newPaypal;
	}
	public void run() {
		boolean flag=true;
        while(flag){
        	synchronized(pay){
        		while(pay.getMoney()==0){
        			System.out.println("Seller is waiting for the money.");
        			try {
						pay.wait();
					} catch (InterruptedException e) {
						flag=false;
					}
        		}
        		if (pay.getMoney()==100){
        			pay.sellerPay();
        			pay.notifyAll();
        		}
        	}
        	synchronized(box){
        		while(box.getIsFull()){
        			try {
						box.wait();
					} catch (InterruptedException e) {
						flag=false;
					}
        		}
        		box.insertPackage();
        		box.notifyAll();
        	}
        }

	}
}


