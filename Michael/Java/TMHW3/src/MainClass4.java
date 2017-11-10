
public class MainClass4 {
	public static void main(String[] args) throws Exception{
		BoxIt3 box = new BoxIt3();
        Paypal2 pay = new Paypal2();
        Client3 c = new Client3(box,pay); 
		Seller3 s = new Seller3(box,pay); 
		
		Thread clientThread = new Thread(c);
		Thread sellerThread = new Thread(s);
		
		clientThread.start();
		sellerThread.start();
				
		Thread.sleep(50);		
		
		
		clientThread.stop();
		sellerThread.stop();
		clientThread.interrupt();
		sellerThread.interrupt();
		
		while(clientThread.isAlive()||sellerThread.isAlive());


		System.out.println("DONE*********************!");
	}

}
