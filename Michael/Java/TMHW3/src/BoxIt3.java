
public class BoxIt3 {
	private boolean isFull;
	
	public BoxIt3(){
		setFull(false); 
	}
	
	public synchronized void insertPackage(){
		setFull(true);
		System.out.println("BoxIt: Inserting new package");
	}
	
	public synchronized void emptyBox(){
		setFull(false);
		System.out.println("BoxIt: Pakage taken");
	}

	public boolean getIsFull() {
		return isFull;
	}

	public void setFull(boolean isFull) {
		this.isFull = isFull;
	}
	
	
}

