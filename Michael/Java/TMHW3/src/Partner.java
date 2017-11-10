public class Partner implements Runnable {

	private int id;
	private int accountNum;
	private String job;
	private BankAccount bank;
	private double money;

	public Partner(int id, int accountNum, String job, BankAccount bank, double money) {	// Constructor
		this.setId(id);
		this.setAccountNum(accountNum);
		this.job = job;
		this.bank = bank;
		this.money = money;
	}

	public synchronized void run() {
		

			if (this.job == "deposit") {		// if job is deposited
				    bank.deposit(money);
					System.out.println(money + " was deposited");
				}
			
			if (this.job == "redraw") {			// if job is redraw
			        bank.redraw(money);
					System.out.println(money + " was redrawn");
				}
		}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public int getAccountNum() {
		return accountNum;
	}

	public void setAccountNum(int accountNum) {
		this.accountNum = accountNum;
	}
	public String getJob(){
		return job;
	}
	public void setJob(String job) {
		this.job = job;
	}
	public BankAccount getBank(){
		return bank;
	}
	public void setBank(BankAccount bank) {
		this.bank = bank;
	}
	public double getMoney(){
		return money;
	}
	public void setMoney(double money) {
		this.money = money;
	}
}
