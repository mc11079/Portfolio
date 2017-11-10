
public class BankAccount {
	
	private double balance;
	
	public BankAccount(){
		balance=0;
	}
	
	public synchronized void deposit(double money){
			if(money<=0){
				System.out.println("Error: deposit negitive number impossible!");
			}
			else{
				for (int i = 1; i <= money; i++) {		// Deposits money dollar by dollar
					balance += 1;
					this.notifyAll();// Notifies threads that are waiting to redraw money
				}					
			}try {
				Thread.sleep(60000);		// Sleeps 
			}

			catch (InterruptedException e) {
				e.printStackTrace();
			}
		}

	
	public  synchronized void redraw(double money) {

			if(money<=0){
				System.out.println("Error: redraw negitive number impossible!");
			}
			
			while(money > balance){
				try {
					this.wait();		// waits to redraw money
				}
				catch (InterruptedException c) {
					c.printStackTrace();
				}
			}
			for (int i = 1; i <= money; i++) {		//redraws money dollar by dollar
				balance -= 1;
			}try {
				Thread.sleep(60000);
			}

			catch (InterruptedException e) {
				e.printStackTrace();
			}
			
	}

	public synchronized double getBalance() {
		return balance;
	}

	
	public synchronized void print(){
		System.out.println("Balance is : " + balance);
	}

}
