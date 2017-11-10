import java.io.*;
import java.net.*;
public class Seller3 implements Runnable {
	BoxIt3 box; 
	Paypal2 pay;

	public Seller3(BoxIt3 newBox, Paypal2 newPaypal){
		box = newBox;
		pay=newPaypal;
	}
	
	public void run() {
		boolean flag=true;
		while(flag){
			synchronized(pay){
				
				while(pay.getMoney()==0){
					System.out.println("Seller: Seller is waiting to receive money.");
					try {
						pay.wait();
					} catch (InterruptedException e) {
						flag=false;
					}
				}
				//if (pay.getMoney()==100){
					pay.sellerPay();
					pay.notifyAll();
				//}
			}

			synchronized(box){
				
				while(box.getIsFull()){
					try {
						box.wait();
					} catch (InterruptedException e) {
						flag=false;
					}
				}
				try {
					String host="127.0.0.1";
					String sentence= " ";
					
					Socket clientSocket = new Socket(host, 6543);
					
					DataOutputStream outToServer =new DataOutputStream(clientSocket.getOutputStream());
					BufferedReader inFromServer =new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));

					outToServer.writeBytes("Is the package found in the supply?\n");
					sentence = inFromServer.readLine();
					
					if(sentence.equals("yes")){
						System.out.println("Stock: "+ sentence);
					}
					else {
						System.out.println("Error with server!");
						System.exit(1);
					}
					System.out.println(sentence);
								
					outToServer.writeBytes("Send Package please\n");
					sentence = inFromServer.readLine();
					
					if(sentence.equals("package sent")){
						System.out.println("Stock: "+ sentence);
					}
					else {
						System.out.println("Error with server!");
						System.exit(1);
					}
					System.out.println(sentence);

							
					clientSocket.close();
				

				} catch (Exception e1) {

					e1.printStackTrace();
				}
				box.insertPackage();
				box.notifyAll();
			}
		}

	}
	}



