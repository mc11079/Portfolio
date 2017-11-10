
public class Paypal2 {
private int money;

public Paypal2(){
	money=0;
}

public synchronized void sellerPay(){
	money=0;
	System.out.println("Paypal: The seller took the money");
}

public synchronized void clientPay(){
	money=100;
	System.out.println("Paypal: The client paid for package");
}

public int getMoney() {
	return money;
}

public void setMoney(int money) {
	this.money = money;
}
}
