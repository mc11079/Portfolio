
public class Client2 implements Runnable {

	BoxIt2 box; 
	Paypal pay;
	

	public Client2(BoxIt2 newBox, Paypal newPaypal){
		box = newBox;
		pay=newPaypal;
	}

	public void run() {
		boolean flag = true;
		while(flag){
			synchronized(pay){
				while(pay.getMoney()==100){
					try {
						pay.wait();
					} catch (InterruptedException e) {
						flag=false;
					}
				}
				if(pay.getMoney()==0){
					pay.clientPay();
					pay.notifyAll();
				} 
			}
			synchronized(box){
				while(!box.getIsFull()){
					System.out.println("Client is waiting for a package.");
					try {
						box.wait();
					} catch (InterruptedException e) {
						flag=false;
					}
				}
				box.emptyBox();
				box.notifyAll();
			}
		}
	}	

}




