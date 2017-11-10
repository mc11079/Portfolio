
//
public class User {
	
	private long userID;	//fields
	private String name; 
	private String eMail;
	
	public User(long userID, String name, String eMail){ //Constructor
		this.userID= userID;
		this.name= name; 
		this.eMail= eMail;
	}
	public long getUserID(){
		return userID; 
	}
	public void setUserID(long newID){
		userID = newID;
	}
	public String getName(){
		return name; 
	}
	public void setName(String newName){
		name=newName; 
	}
	public String getEmail(){
		return eMail; 
	}
	public void setEmail(String newEmail){
		eMail=newEmail;
	}
	
}
