

import java.util.Scanner;

public class MainClass {
	public static boolean nonNeg = true;

	public static void main(String[] args) {
		
		int numOfEdges = 0, counter = 1, to = 0, from = 0, weight = 0, numOfV = 0;

		// input
		Scanner input = new Scanner(System.in);
		System.out.println("Please enter number of vertices: ");
		numOfV=input.nextInt();
		System.out.println("Please enter number of edges: ");
		numOfEdges = input.nextInt();
		
		Graph g = new Graph(numOfV);		//creates new graph

		System.out.println("Please input edges  <to> <from> <weight>: ");

		while (counter <= numOfEdges) {
			to = input.nextInt();
			from = input.nextInt();
			weight = input.nextInt();

			if (weight < 0)				//updates boolean value for future reference
				nonNeg = false;

			g.addEdge(to, from, weight);		//adds edge to graph
			counter++;
		}

		g.print();

		avikstan_water(g);

		input.close();
	} // main

	public static void shortestPath(Graph g) {
		boolean negCircle = false;		//updates if a negative circle exists in the graph
		
		/*Number of Vertices:8
		 * Number of Edges: 10
		 * Example Graph:
		 1 0 2
		 3 1 1 
		 5 0 3 
		 6 5 6 
		 6 3 2 
		 2 1 4 
		 4 2 3 
		 4 3 3 
		 7 4 4 
		 7 6 4
		 */

		if (nonNeg) { 				// Dijkstra
			g.dijkstra();
		} else { 					// Bellman Ford
			negCircle = g.bellmanFord(); 			//updates if there is a negative circle
		}
		System.out.println("************************");
		
		if (!negCircle) {			//prints result if no negative circle exists
			System.out.println("Result: ");
			for (int i = 0; i < g.getV(); i++) {
				System.out.print(g.vMatrix[i].getDistance() +" ");
			}
		}
	}// shortestPath
	
	public static void landesrtra_parking_path(Graph g){
		Scanner input = new Scanner(System.in);
		
		/*Number of vertices: 5
		 *Number of edges: 12
		 Example graph: 
		 0 1 5
		 1 0 5
		 3 0 2
		 0 3 2
		 1 2 3
		 2 1 3
		 3 2 6
		 2 3 6
		 3 4 4
		 4 3 4
		 2 4 5
		 4 2 5
		 
		 Example heights: 
		 7 5 8 9 3
		 */
		if (!nonNeg) {
			System.out.println("Invalid input, no negative paths allowed");
		} else {
			System.out
					.println("Please enter height of parking garage for each city: (V0....Vn) ");
			for (int i = 0; i < g.getV(); i++) {
				g.vMatrix[i].setHeight(input.nextInt());
			}

			System.out.println("****************************");
			g.dijkstra();					//uses Dijkstra to find shortest path from s to every "city" taking into consideration the height of garage

			for (int i = 0; i < g.getV(); i++) {
				System.out.print("Vertex #" + i + " : w = " + g.vMatrix[i].getDistance() + " h = " + g.vMatrix[i].getHeight() + " p = ");
				printPath(g, i);		//Print path using recursion 
				System.out.println();
			}
		}
		input.close();
	}//landestra_parking_path

	public static void avikstan_water(Graph g){
		Scanner input = new Scanner(System.in);
		boolean negCircle = false;
		
		/*Number of Vertices: 5
		 *Number of Edges: 6
		 Example Graph:
		 1 0 3
		 2 0 6
		 3 1 5
		 4 1 4
		 4 3 1
		 4 2 2
		 
		 Example city taxes: 
		 2 3 10 1 6 
		 */
		
		System.out.println("Please enter amount of tax for each city: (V0....Vn) ");
		for(int i=0; i<g.getV(); i++){
			g.vMatrix[i].setCityTax(input.nextInt());
		}
		
		System.out.println("****************************");
		
		if(nonNeg){				//no negative numbers were inputed = use Dijkstra
			g.dijkstra();
		}
		else
			negCircle = g.bellmanFord();	//negative numbers were entered = Bellman-Ford
		
		if(!negCircle){			//No negative circle, valid to print
			
			for(int i=0; i<g.getV();i++){
				g.vMatrix[i].setDistance(g.vMatrix[i].getDistance() + g.vMatrix[0].getCityTax());
				
				System.out.print("Vertex #" + i + " : price = " + g.vMatrix[i].getDistance() + " path = ");
					printPath(g,i);	
					System.out.println();				
			}
		}
		input.close();
	}//avikstan_water
	
	public static int printPath(Graph g, int i){		//prints the path using the parent of every vertex
		if(i==0){
			System.out.print("0 ");
			return 1;
		}
			printPath(g, g.vMatrix[i].getParent());
			System.out.print(i+ " ");
			
		return 1;
			
	}//printPath

}// mainClass
