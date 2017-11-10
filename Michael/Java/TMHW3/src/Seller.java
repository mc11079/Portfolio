
public class Seller  implements Runnable {
	BoxIt box; 
	//String package;
	
	public Seller(BoxIt newBox){
		box = newBox;
	}
	public void run() {
		boolean flag=true;
		synchronized (box){
			while (flag) {
				while (box.getIsFull()){
					System.out.println("Seller is waiting for the box to empty.");
					try {
						box.wait();		
					}
					catch (InterruptedException c) {
						flag=false;
					}
				}
					box.insertPackage();
					box.notifyAll();
			}
			
		}
		}

}
