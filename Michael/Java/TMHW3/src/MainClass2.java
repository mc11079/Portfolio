
public class MainClass2 {
	public static void main(String[] args){
		BoxIt box = new BoxIt();


		
		Client c = new Client(box);
		Seller s = new Seller(box); 
		
		Thread t1 = new Thread(c);
		Thread t2 = new Thread(s);
		
		t1.start();
		t2.start();
		
		try {
			Thread.sleep(10000);		
		}
		catch (InterruptedException e) {
			e.printStackTrace();
		}           
		t1.interrupt();
		t2.interrupt();

		System.out.println("DONE!");
	}

}
