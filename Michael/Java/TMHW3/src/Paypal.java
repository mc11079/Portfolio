
public class Paypal {
private int money;

public Paypal(){
	money=0;
}

public synchronized void sellerPay(){
	money=0;
	System.out.println("The seller take the money");
}

public synchronized void clientPay(){
	money=100;
	System.out.println("The client pay the money");
}

public int getMoney() {
	return money;
}

public void setMoney(int money) {
	this.money = money;
}
}
