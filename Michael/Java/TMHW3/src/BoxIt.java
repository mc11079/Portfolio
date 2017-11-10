
public class BoxIt {
	private boolean isFull;
	
	public BoxIt(){
		setFull(true); 
	}
	
	public synchronized void insertPackage(){
		setFull(true);
		System.out.println("Inserting new package");
	}
	
	public synchronized void emptyBox(){
		setFull(false);
		System.out.println("Pakage taken");
	}

	public boolean getIsFull() {
		return isFull;
	}

	public void setFull(boolean isFull) {
		this.isFull = isFull;
	}
	
	
}

