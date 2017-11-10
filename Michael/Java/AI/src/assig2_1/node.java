package assig2_1;
import java.util.Comparator;


public class node implements Comparator<node>{
	char name;
	int num;
	int cost;
	boolean isExplored;
	boolean isStart;
	boolean isTarget;
	boolean isFront;
	private int node;
	
	public node(){}
	
	public node(char name,int num,boolean isExplored,boolean isStart,boolean isTarget,boolean isFront){
		this.name=name;
		this.num=num;
		this.cost=0;
		this.isExplored=isExplored;
		this.isStart=isStart;
		this.isFront=isFront;
		this.isTarget=isTarget;
		this.isStart=isStart;
	}
	
	public node node(node a){
		this.name=a.name;
		this.num=a.num;
		this.cost=a.cost;
		this.isExplored=a.isExplored;
		this.isStart=a.isStart;
		this.isTarget=a.isTarget;
		this.node=a.node;
		return this;
	}
	
	public void setCost(int x){
		this.cost+=x;
	}
	public int getCost(int x){
		return this.cost;
	}
	
	
	 
	    public int compare(node node1, node node2)
	    {
	        if (node1.cost < node2.cost)
	            return -1;
	        if (node1.cost > node2.cost)
	            return 1;
	        if (node1.node < node2.node)
	            return -1;
	        return 0;
	    }
	 
	    @Override
	    public boolean equals(Object obj)
	    {
	        if (obj instanceof node)
	        {
	            node node = (node) obj;
	            if (this.node == node.node)
	            {
	                return true;
	            }
	        }
	        return false;
	    }
}
