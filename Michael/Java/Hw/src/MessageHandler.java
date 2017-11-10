

public class MessageHandler implements Runnable {
	public Server newServer;	
	public long receiverID;
	public long senderID;
	

	public MessageHandler(Server newServer, long rID, long sID) {	// MessageHandler Constructor ******
		this.newServer = newServer;
		receiverID = rID;
		senderID = sID;
	}

	public synchronized void run() {
		System.out.println("Number of registered users: "		// Print simulation for sending YO!'s
				+ newServer.mapServer.size());
		Server.handleMessage(receiverID, senderID);
		
		System.out.println(newServer.getSenderName() + " sent a YO! to "
				+ newServer.getReceiverName() + " now. "
				+ newServer.getNumOfYos()
				+ " YO! message/s has/have been sent until now. ");
		
	
	}

}

/*
User Aviad was registered now.
User Shira was registered now.
Aviad sent YO! to Shira now. 1 YO! Message has been sent until now. Number of
registered users: 2.
User Ehud was registered now.
Ehud sent YO! to Aviad now. 2 YO! Messages have been sent until now. Number of
registered users: 3. 
 */