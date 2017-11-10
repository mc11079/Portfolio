import java.io.*;
import java.net.*;

public class Server {
	static boolean flag=false;
	public static void main(String[] args) throws Exception
	{
		
		String clientSentence=" ";
		
		ServerSocket serverSocket = new ServerSocket(6543);
		
		while(!flag) {
			Socket connectionSocket = serverSocket.accept();
			
			BufferedReader inFromClient = new BufferedReader(new InputStreamReader(connectionSocket.getInputStream()));
			
			DataOutputStream outToClient = new DataOutputStream(connectionSocket.getOutputStream());
			
			clientSentence = inFromClient.readLine();
			System.out.println("Is the package found in the supply?");
			
				if(clientSentence.equals("Is the package found in the supply?")){
					outToClient.writeBytes("yes\n");
					System.out.println("Server: yes");
				}
				else 
					outToClient.writeBytes("Wrong input \n");
				
				clientSentence=inFromClient.readLine();
			   
				if(clientSentence.equals("Send Package please")){
					outToClient.writeBytes("package sent\n");
					System.out.println("Package sent");
				}
				else 
					outToClient.writeBytes("Wrong input \n");
			
			connectionSocket.close();
		}
		serverSocket.close();
	}
	
	public void stopServer(){
		flag=true; 
	}
	
}
