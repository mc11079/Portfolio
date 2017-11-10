
public class Client implements Runnable {
	
	BoxIt box; 
	//String package;
	
	public Client(BoxIt newBox){
		box = newBox; 
	}

	public void run() {
		boolean flag = true;
		synchronized (box){
			while (flag) {
				while (!box.getIsFull()){
					System.out.println("Client is waiting for a package.");
					try {
						box.wait();		
					}
					catch (InterruptedException c) {
						if(box.getIsFull()){
							box.setFull(false);
							System.out.println("Pakage taken");
						}
						flag = false;
					}
				}
					box.emptyBox();
					box.notifyAll();
			}
			
		}
		}

}
