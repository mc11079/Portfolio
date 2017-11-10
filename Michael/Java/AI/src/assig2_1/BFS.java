package assig2_1;
import java.util.*;


public class BFS extends main{
	node[] V;
	int[][] E;
	Queue<node> queue;
	
	public BFS(node[] v,int[][] e){
		V=v;
		E=e;
		queue=new LinkedList<node>();
	}

	
	public void start(){
		 int number_of_nodes=V.length-1;
		 node cur;
		 int flag=0;
		 int i;
		 node source=findStart(V);
		 source.isExplored=true;
		 queue.add(source);
		 
		 while (!queue.isEmpty()&&flag==0){
			 cur=queue.remove();
			 if(cur.isTarget==true)flag=1;
			 i=cur.num;
			 System.out.print(cur.name+" + ");
			 while(i<=number_of_nodes && flag==0)
			 {
				 if(E[cur.num][i]>0 && V[i].isFront==false)
				 {
					 queue.add(V[i]);
					 V[i].isFront=true;
				 }
				 ++i;
			 }
			 
			 cur.isExplored=true;

			 if(cur.isTarget==true)System.out.println("Found = "+cur.name);
		 }
		 
		 
		 
		 
		 
	}
}
