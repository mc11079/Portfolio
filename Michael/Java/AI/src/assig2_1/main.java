package assig2_1;
import java.util.ArrayList;
import java.util.Stack;
import java.util.Scanner;

public class main {
	static ArrayList nodes=new ArrayList();
	
	public static void main(String[] args){
		
		
		Scanner reader = new Scanner(System.in);
		node[] V=new node[6];
		//char name,int num,boolean isExplored,boolean isStart,boolean isTarget,boolean isFront
		V[0]=new node('A',0,false,true,false,false);
		V[1]=new node('B',1,false,true,false,false);
		V[2]=new node('C',2,false,true,false,false);
		V[3]=new node('D',3,false,true,false,false);
		V[4]=new node('E',4,false,true,false,false);
		V[5]=new node('F',5,false,true,true,false);

		
		//ENTER the matrix
		
		int [][] E = new int[6][6];
		restart(E);//every edge is -1
		//manual Initialization
		E[0][1]=5;                                   
		E[0][2]=10;
		E[1][3]=5;
		E[1][4]=6;
		E[2][4]=1;
		E[2][5]=2;
		E[4][1]=2;
		
		printMe(E,V);
		//1-bfs 2-cost 3-dfs 4-dfsIter
		
		int x = 1;
		System.out.println("Enter a number: ");
		//menu
				System.out.println(" choose the way to go: ");

				System.out.println("	1 - for BFS  ");
				System.out.println("	2 - for uniform cost  ");
				System.out.println("	3 - for DFS  ");
				System.out.println("	4 - for DFS iterarive  ");
				
		
		//	x = reader.nextInt();
		//	if(x==1){
		//		BFS temp = new BFS(V,E);	System.out.println("the BFS result:");		temp.start();	}

		//	if(x==1){
		//		UFC temp = new UFC(V,E);	System.out.println("the UFCost result:");		temp.start();	}
			
			
			if(x==1){
				DFS temp = new DFS(V,E);	System.out.println("the DFS result:");			temp.start();			}
		
		
		}//end main
			
		
	
		
		
		//functions
	

	

	protected static node findStart(node[] v) {
		for(int i=0;i<v.length;++i){
			if(v[i].isStart==true)return v[i];
			
		}

		System.out.println("start not found");
		return null;
	}
	
	protected static node findTarget(node[] v) {
		for(int i=0;i<v.length;++i){
			if(v[i].isTarget==true)return v[i];
			
		}
		System.out.println("target not found");
		return null;
	}



	protected static void printMe(int[][] edge,node[] V) {
		// TODO Auto-generated method stub
		//System.out.println("  A   B   C   D   E   F ");
		for(int i=0;i<V.length;++i){
			System.out.print("  "+V[i].name+" ");
		}
		System.out.println();
		for(int i=0;i<edge.length;++i){
			System.out.print(V[i].name);
			for(int j=0;j<edge.length;++j){
				System.out.print(" "+edge[i][j]+" ");
				
			}
			System.out.println();
		}
		
	}

	private static void restart(int[][] edge) {
		for(int i=0;i<edge.length;++i){
			for(int j=0;j<edge.length;++j){
				edge[i][j]=-1;
			}
		}
		
	}
	
	
	
	
}

/*private static void BFS(int[][] E,node[] V) {
System.out.println("Find shorter path");
//start
node x = findStart(V);
node cur;
x.isFront=true;
System.out.println("you start in = "+x.name);
cur=x;

if(cur.isTarget!=true){
for(int i=0;i<V.length;++i){
	
}
}else{
	System.out.println("found "+cur.name );
}
}*/