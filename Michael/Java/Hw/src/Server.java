

import java.util.*;

public class Server {
	static Map <Long,User> mapServer;
	private static String senderName;			// *** static?
	private static String receiverName;
	private static int numOfYos; 


	public Server() {			//Constructor
		mapServer = new HashMap<Long,User>(200);	// map data structure (key = ID, user)
		setSenderName(" ");
		setReceiverName(" ");
		setNumOfYos(0);
	}

	public static synchronized void registerUser(long userID, String name, String eMail) {		//inserts new users into server (MAP)
		if(!mapServer.containsKey(userID)) {						//makes sure a user isn't registered twice.
		User newUser = new User(userID, name, eMail);
		mapServer.put(userID, newUser); 			///***** exception
		System.out.println("User " + newUser.getName() + " was registered now."); //****** Print here?
		}
	}

	public static synchronized void handleMessage(long senderID, long receiverID) {		//Updates sender and receiver
		User sender, receiver;
		
		sender= mapServer.get(senderID);
		setSenderName(sender.getName());

		receiver= mapServer.get(receiverID);
		setReceiverName(receiver.getName());
		
		setNumOfYos(getNumOfYos() +1);
	}

	public String getReceiverName() {	
		return receiverName;
	}

	public static void setReceiverName(String name) {
		receiverName = name;
	}

	public String getSenderName() {
		return senderName;
	}

	public static void setSenderName(String name) {
		senderName = name;
	}

	public static synchronized int getNumOfYos() {
		return numOfYos;
	}

	public static synchronized void setNumOfYos(int numOfYos) {
		Server.numOfYos = numOfYos;
	}

}
