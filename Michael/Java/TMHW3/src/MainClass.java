/**
 * 
 * @author Gal Aavrahami & Michael Cohen
 * @serial 203668553, 203128
 * 
 *
 * 
 */
public class MainClass {

	public static void main(String[] args) {
		BankAccount bank = new BankAccount(); // Joined bank account

		double deposit1 = 3200, deposit2 = 5700, redraw3 = 150, redraw4 = 200; // Amount
																				// of


		Partner p1 = new Partner(203668553, 159357, "deposit", bank, deposit1); // Partners
																				// that
																				// deposits
																				// money
		Partner p2 = new Partner(203128293, 325147, "deposit", bank, deposit2);
		Partner p3 = new Partner(203548687, 102458, "redraw", bank, redraw3); // Partners
																				// that
																				// redraw
																				// money
		Partner p4 = new Partner(203895742, 365847, "redraw", bank, redraw4);

		Thread t1 = new Thread(p1); // Threads simulate partners
		Thread t2 = new Thread(p2);
		Thread t3 = new Thread(p3);
		Thread t4 = new Thread(p4);

		t1.start();
		t3.start();
		t2.start();
		t4.start();

		
		try {
			Thread.sleep(500000);
		} catch (InterruptedException e) {
			
			e.printStackTrace();
		}
		
		bank.print();
	}
}
