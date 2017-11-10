import java.util.ArrayList;
import java.util.List;
import java.util.PriorityQueue;

public class Graph {

	private int vertices; // num of vertices
	private int edges; // num of edges
	public int[][] adjMatrix; // adjacency matrix graph representation
	public  Vertex[] vMatrix; // Array of vertices

	public Graph(int numOfV) { // Constructor
		vertices = numOfV;
		edges = 0;
		vMatrix = new Vertex[vertices];
		adjMatrix = new int[vertices][vertices];

		for (int i = 0; i < vertices; i++) {
			vMatrix[i] = new Vertex(); // creates new Vertex and updates id
			vMatrix[i].setId(i);
			for (int j = 0; j < vertices; j++) {
				adjMatrix[i][j] = 0; // initializes matrix
			}
		}
	}

	public void addEdge(int to, int from, int weight) { // adds an edge to the graph
		try {
			adjMatrix[to][from] = weight;
			edges++;
		} catch (ArrayIndexOutOfBoundsException index) {
			System.out.println("Error, invaid input");
		}
	}

	public int getEdge(int to, int from) { // retrieves an edge
		try {
			return adjMatrix[to][from];
		} catch (ArrayIndexOutOfBoundsException index) {
			System.out.println("Error, invalid input");
		}
		return -1;
	}

	public void print() { // prints adjMatrix (graph)

		System.out.println("The adjacency matrix for the given graph is: ");
		System.out.print("  ");
		for (int i = 0; i < vertices; i++)
			System.out.print("v" + i + " ");
		System.out.println();

		for (int i = 0; i < vertices; i++) {
			System.out.print("v" + i + " ");
			for (int j = 0; j < vertices; j++)
				System.out.print(getEdge(j, i) + "  ");
			System.out.println();
		}
	}

	private void initialize() { // Initializes vMatrix for Dijkstra and Bellman-Ford
		for (int i = 1; i < vertices; i++) { // Initialization to infinity
			vMatrix[i].setDistance(Integer.MAX_VALUE);
			vMatrix[i].setParent(-1);
		}
		vMatrix[0].setDistance(0); // source "s" is initialized to 0
		vMatrix[0].setParent(-1);

	}

	private void relax(Vertex u, Vertex v) { // can we improve v's distance?
		
		//If the city tax/height isn't inputed it won't change the relax value

		if (v.getDistance() > u.getDistance() + adjMatrix[v.getId()][u.getId()] + vMatrix[v.getId()].getCityTax()) {

			v.setDistance(u.getDistance() + adjMatrix[v.getId()][u.getId()] + vMatrix[v.getId()].getCityTax());

			v.setParent(u.getId()); // update parent

			if (vMatrix[v.getId()].getHeight() > vMatrix[u.getId()].getHeight()) {
				vMatrix[v.getId()].setHeight(vMatrix[u.getId()].getHeight());
			}
		} 
		else if (v.getDistance() == u.getDistance() + adjMatrix[v.getId()][u.getId()] + vMatrix[v.getId()].getCityTax()
				&& vMatrix[v.getId()].getHeight() < vMatrix[u.getId()]
						.getHeight()) {

			v.setDistance(u.getDistance() + adjMatrix[v.getId()][u.getId()]);

			v.setParent(u.getId()); // update parent

		}
	}

	private List<Vertex> adjacency(Vertex v) { // returns a List containing all adjacent vertices not already visited
		List<Vertex> result = new ArrayList<Vertex>();
		for (int x = 0; x < vertices; x++) {
			if ((this.getEdge(x, v.getId()) != 0) && (!v.isVisited())) {
				result.add(vMatrix[x]);
			}
		}
		return result;

	}

	public void dijkstra() {	//Performs Dijkstra's algorithm of a given graph
		int adjSize = 0;
		Vertex u, v;
		List<Vertex> adjList = new ArrayList<Vertex>();
		PriorityQueue<Vertex> q = new PriorityQueue<Vertex>(vertices, new Vertex());

		this.initialize();	//Initializes distances

		for (int i = 0; i < vertices; i++) {	//Adds vertices to queue
			q.add(vMatrix[i]);
		}

		while (!q.isEmpty()) {
			u = q.remove();			//Removes vertex with the most minimal distance

			if (u.getDistance() == Integer.MAX_VALUE) 	//No way of reaching this vertex (not connected)
				break;

			adjList = adjacency(u);	//finds all adjacent vertices that haven't already been visited 
			adjSize = adjList.size();	//number of adjacent vertices

			for (int i = 1; i <= adjSize; i++) {
				v = adjList.remove(0);
				relax(u, v);	
			}

			u.setVisited(true);
			q.clear(); // Update priority queue
			for (int i = 0; i < vertices; i++) {
				if (!vMatrix[i].isVisited())
					q.add(vMatrix[i]);
			}
		}
	}

	public boolean bellmanFord() {	//Bellman-Ford Algorithm for finding shortest distance from source (also neg.)

		initialize();		//Initializes distances

		for (int i = 0; i < vertices - 1; i++) {		//Uses relax function on V-1 vertices
			for (int u = 0; u < vertices; u++) {
				for (int v = 0; v < vertices; v++) {
					if (adjMatrix[v][u] != 0) {
						relax(vMatrix[u], vMatrix[v]);
					}
				}
			}
		}
		for (int u = 0; u < vertices; u++) {		//Checks for neg circle - if I am able to improve the distance futher then there is a neg circle)
			for (int v = 0; v < vertices; v++) {
				if (adjMatrix[v][u] != 0
						&& vMatrix[v].getDistance() > vMatrix[u].getDistance()
								+ adjMatrix[v][u] + vMatrix[v].getCityTax()) {
					System.out.println("NEGETIVE  CIRCLE!");
					return true;		//There is a negative circle - algorithm was unsuccessful 
				}
			}
		}
		return false;	//No negative circle - successful
	}

	// ********Getters and setters**********

	public int getV() {
		return vertices;
	}

	public int getE() {
		return edges;
	}

	public void setE(int e) {
		edges = e;
	}

	public void setV(int v) {
		vertices = v;
	}

}
