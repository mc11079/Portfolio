import java.util.Comparator;

class Vertex implements Comparator<Vertex>
{
    private int id; 
	private int distance;
    private int parent;
    private boolean visited=false; 
    private int height; 			
    private int cityTax; 			
 
    public Vertex(){}
 
    public Vertex(int id, int distance, int cost, int parent)
    {
        this.distance = distance;
        this.parent = parent;
        this.id=id; 
        this.visited=false; 
    }
 
    @Override
    public int compare(Vertex vertex1, Vertex vertex2)		//used to compare vertices for priority queue
    {
        if (vertex1.distance < vertex2.distance)
            return -1;
        if (vertex1.distance > vertex2.distance)
            return 1;
        return 0;
    }
    
    //*********GETTERS AND SETTERS**********/

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public int getDistance() {
		return distance;
	}

	public void setDistance(int distance) {
		this.distance = distance;
	}

	public int getParent() {
		return parent;
	}

	public void setParent(int parent) {
		this.parent = parent;
	}

	public boolean isVisited() {
		return visited;
	}

	public void setVisited(boolean visited) {
		this.visited = visited;
	}

	public int getCityTax() {
		return cityTax;
	}

	public void setCityTax(int cityTax) {
		this.cityTax = cityTax;
	}

	public int getHeight() {
		return height;
	}

	public void setHeight(int height) {
		this.height = height;
	}
}