//Michael Cohen (203128293), Gal Avrahami (203668553)
package sql_injection;


import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.Scanner;
public class HW3 {
	static String driver="com.mysql.jdbc.Driver";
	static String path="jdbc:mysql://localhost:3306/sakila";
	static String host="root";
	static String password="";
	
public static Connection getConnection() throws  Exception{
		try {
			Class.forName(driver);
			Connection con=DriverManager.getConnection(path,host,password);
			return con;
		} catch (Exception e){System.out.println(e);}
		return null;
	}

public static void FindFilm (String film_id) throws Exception{	
	//check if the insert query was successful
Connection myCon =getConnection();
	String selectSQL = "SELECT * FROM film WHERE film.film_id= "+film_id;
	Statement stmt = myCon.createStatement();
	ResultSet rs = stmt.executeQuery(selectSQL);
		while(rs.next()){
			int id = rs.getInt("film_id");
			String title= rs.getString("title");
			String description= rs.getString("description");
			int release_year= rs.getInt("release_year");
			int language_id= rs.getInt("language_id");
			String original_language_id= rs.getString("original_language_id");
			int rental_duration= rs.getInt("rental_duration");
			double rental_rate= rs.getDouble("rental_rate");
			int length= rs.getInt("length");
			double replacement_cost= rs.getDouble("replacement_cost");
			String rating= rs.getString("rating");
			String special_features= rs.getString("special_features");
			String last_update= rs.getString("last_update");
			System.out.println("id :"+ id + ", title: " + title +", description: "+description+",release_year: "+release_year+", language_id: "+language_id+", original_language_id: "+original_language_id+", rental_duration: "+rental_duration+", rental_rate: "+rental_rate+", length: "+length+", replacement_cost: "+replacement_cost+", rating: "+rating+", special_features: "+special_features+", last_update: "+last_update);
		}
	}	


public static void  inject () throws Exception {
FindFilm("'' or 1=1");

}

public static void main(String[] args) {
	
	int choice;
	Scanner mainInput= new Scanner (System.in);
	Scanner stringInput= new Scanner (System.in);
	
	try{				
				System.out.println("Please choose option: \n"
									+"1: Find movie by id \n"
									+"2: Attack DB");
				choice = mainInput.nextInt();				
				switch(choice) {
				
				case 1: 
					//Find film
					 System.out.println("Please enter movie ID: ");
				      String  MovieId = stringInput.nextLine();
					FindFilm(MovieId);
					break;
				
				case 2: 
					//Attack
					 inject();
					break;		
			}
			
	}
	catch(Exception ex){
		System.out.println("not connect!");
	}
	mainInput.close();
	stringInput.close();

}

}
	


