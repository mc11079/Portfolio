package assig2_1;
import java.io.*;
import java.util.*;


public class DFS extends main {
	node[] V;
	int[][] E;
	private Stack<node> stack;
	
	public DFS(node[] v,int[][] e){
		V=v;
		E=e;
		stack = new Stack<node>();
		
	}
	
	public void start(){
	int number_of_nodes=V.length;
	 node cur;
	 int flag=0;
	 int i;
	 node source=findStart(V);
	 stack.push(source);
	 System.out.print(source.name+" + ");
	 source.isFront=true;
	
	 while(!stack.isEmpty()&&flag==0)
	 {
		 cur=stack.peek();
		 i=cur.num;
		 while(i<=number_of_nodes-1&&flag==0)
		 {
			 if(E[cur.num][i]>0 && V[i].isFront==false)
			 {
				 stack.push(V[i]);
				 V[i].isFront=true;
						 V[i].isFront=true;;
				 cur=V[i];
				 i=1;
				 System.out.print(cur.name + " + ");
				 if(cur.isTarget==true)flag=1;
				 
				 continue;
				 
			 }
			 ++i;
		 }
		 if(cur.isTarget==true)System.out.println("Found = "+cur.name);
		 stack.pop().isExplored=true;
	 }
	}
}	

	/*	
		System.out.println("");
		//LinkedList<node> al=new LinkedList<node>(); 
		boolean visited[] = new boolean[V.length];
		Queue queue = new LinkedList();
		
		node x=findStart(V);
		queue.add(x);
		
		
		x.isFront=true;
		
		
		while(x.isTarget!=true){
		while(queue.size()>0){
			
			for(int i=0;i<V.length;++i){
				if(E[x.num][i]>0 && V[i].isExplored!=true){
					
			if(V[i].isFront!=true)	{queue.add(V[i]); x.isExplored=true;};
				V[i].isFront=true;
				
				}
			
			
			
			}
			System.out.print(x.name+" + ");
			
			x=(node) queue.poll();
			}
		}
		
		System.out.println("-->  found target = "+x.name);
		
	}
}

////////////////
//Java program to print BFS traversal from a given source vertex.
//BFS(int s) traverses vertices reachable from s.


//This class represents a directed graph using adjacency list
//representation
/*
class Graph
{
	private int V; // No. of vertices
	private LinkedList<Integer> adj[]; //Adjacency Lists

	// Constructor
	Graph(int v)
	{
		V = v;
		adj = new LinkedList[v];
		for (int i=0; i<v; ++i)
			adj[i] = new LinkedList();
	}

	// Function to add an edge into the graph
	void addEdge(int v,int w)
	{
		adj[v].add(w);
	}

	// prints BFS traversal from a given source s
	void BFS(int s)
	{
		// Mark all the vertices as not visited(By default
		// set as false)
		boolean visited[] = new boolean[V];

		// Create a queue for BFS
		LinkedList<Integer> queue = new LinkedList<Integer>();

		// Mark the current node as visited and enqueue it
		visited[s]=true;
		queue.add(s);

		while (queue.size() != 0)
		{
			// Dequeue a vertex from queue and print it
			s = queue.poll();
			System.out.print(s+" ");

			// Get all adjacent vertices of the dequeued vertex s
			// If a adjacent has not been visited, then mark it
			// visited and enqueue it
			Iterator<Integer> i = adj[s].listIterator();
			while (i.hasNext())
			{
				int n = i.next();
				if (!visited[n])
				{
					visited[n] = true;
					queue.add(n);
				}
			}
		}
	}

	// Driver method to
	public static void main(String args[])
	{
		Graph g = new Graph(4);

		g.addEdge(0, 1);
		g.addEdge(0, 2);
		g.addEdge(1, 2);
		g.addEdge(2, 0);
		g.addEdge(2, 3);
		g.addEdge(3, 3);

		System.out.println("Following is Breadth First Traversal "+
						"(starting from vertex 2)");

		g.BFS(2);
	}
}

*/