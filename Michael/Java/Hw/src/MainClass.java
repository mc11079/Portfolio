
/**
 * 
 * @author Gal Aavrahami  & Michael Cohen
 * @serial 203668553, 203128293
 * 
 * This program creates a server and users. 
 * The program simulates the sending of YO! messages from one user to another. 
 * 
 */

public class MainClass {

	public static void main(String[] args) {		
		
		Server newServer = new Server();			// create a new server
		newServer.registerUser(203668553, "Gal", "iAmCool@gmail.com");			//register new users
		//newServer.registerUser(203668553, "Gal", "iAmCool@gmail.com");			//register new users

		newServer.registerUser(203128293, "Michael", "iAmCooler@gmail.com");
		

		Thread T1 = new Thread (new MessageHandler(newServer,203668553,203128293));		// create a thread
		T1.start();

		Thread T2 = new Thread (new MessageHandler(newServer,203128293 ,203668553 ));
		T2.start();
		newServer.registerUser(123456789, "Aviad", "Metargel@gmail.com");

		
	}

}
