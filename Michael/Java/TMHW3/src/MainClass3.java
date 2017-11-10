
public class MainClass3 {
	public static void main(String[] args){
		BoxIt2 box = new BoxIt2();
        Paypal pay=new Paypal();

		
		Client2 c = new Client2(box,pay);
		Seller2 s = new Seller2(box,pay); 
		
		Thread t1 = new Thread(c);
		Thread t2 = new Thread(s);
		
		t1.start();
		t2.start();
		
		try {
			Thread.sleep(10);		
		}
		catch (InterruptedException e) {
			e.printStackTrace();
		}
		t1.stop(); 
		t2.stop();
		t1.interrupt();
		t2.interrupt();
		

while(t1.isAlive()||t2.isAlive());
		System.out.println("DONE!");
	}

}
