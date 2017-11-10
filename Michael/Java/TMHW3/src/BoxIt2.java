
public class BoxIt2 {
private boolean isFull;
	
	public BoxIt2(){
		setFull(false); 
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
