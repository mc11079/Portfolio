package assig2_1;

import java.util.Stack;

public class DFS_I {
	node[] V;
	int[][] E;
	private Stack<node> stack;
	
	public DFS_I(node[] v,int[][] e){
		V=v;
		E=e;
		stack = new Stack<node>();
		
	}
}
/*
import java.util.InputMismatchException;
import java.util.Scanner;
import java.util.Stack;
 
public class IterativeDeepening
{
    private Stack<Integer> stack;
    private int numberOfNodes;
    private int depth;
    private int maxDepth;
    private boolean goalFound = false;
 
    public IterativeDeepening()
    {
        stack = new Stack<Integer>();
    }
 
    public void iterativeDeeping(int adjacencyMatrix[][], int destination)
    {
        numberOfNodes = adjacencyMatrix[1].length - 1;
        while (!goalFound)
        {
            depthLimitedSearch(adjacencyMatrix, 1, destination);
            maxDepth++;
        }
        System.out.println("\nGoal Found at depth " + depth);
    }
 
    private void depthLimitedSearch(int adjacencyMatrix[][], int source, int goal)
    {
        int element, destination = 1;
        int[] visited = new int[numberOfNodes + 1];
        stack.push(source);
        depth = 0;
        System.out.println("\nAt Depth " + maxDepth);
        System.out.print(source + "\t");
 
        while (!stack.isEmpty())
        {
            element = stack.peek();
            while (destination <= numberOfNodes)
            {
                if (depth < maxDepth)
                {
                    if (adjacencyMatrix[element][destination] == 1)
                    {
                        stack.push(destination);
                        visited[destination] = 1;
                        System.out.print(destination + "\t");
                        depth++;
                        if (goal == destination)
                        { 
                            goalFound = true;
                            return;
                        }
                        element = destination;
                        destination = 1;
                        continue;
                    }
                } else 
                {
                    break;
                }
                destination++;
            }
            destination = stack.pop() + 1;
            depth--;
        }
    }
 
    
}*/