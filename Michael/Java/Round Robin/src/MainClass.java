import java.util.LinkedList;
import java.util.Queue;



public class MainClass {
 private static Process[] processes;

 public static void main(String[] args) {
  int numOfP = 6, intervalSize1 = 3, intervalSize2=1, intervalSize3 = 5;
  setProcesses(new Process[numOfP]);


  // First interval
  createProcesses(numOfP);
  roundRobin(intervalSize1, numOfP);
  System.out.println("Interval #1 = " + intervalSize1);
  print(numOfP);
  
  // Second interval
  createProcesses(numOfP);
  roundRobin(intervalSize2, numOfP);
  System.out.println("Interval #2 = " + intervalSize2);
  print(numOfP);
  
  // Third interval
  createProcesses(numOfP);
  roundRobin(intervalSize3, numOfP);
  System.out.println("Interval #3 = " + intervalSize3);
  print(numOfP);



 }// main

 public static void createProcesses(int numOfP) {

  Process p1 = new Process(0, 5); // Create new processes
  p1.setId(1);
  processes[0] = p1;
  Process p2 = new Process(1, 3);
  p2.setId(2);
  processes[1] = p2;
  Process p3 = new Process(3, 6);
  p3.setId(3);
  processes[2] = p3;
  Process p4 = new Process(5, 1);
  p4.setId(4);
  processes[3] = p4;
  Process p5 = new Process(6, 4);
  p5.setId(5);
  processes[4] = p5;
  Process p6 = new Process(8, 2);
  p6.setId(6);
  processes[5] = p6;

 }// createProcesses

 public static void roundRobin(int intervalSize, int numOfP) {
  int CPUtime = 0, ATcounter=0;
  Queue<Process> q = new LinkedList<Process>();

  do {
   for (int k = 0; k < numOfP && ATcounter < 6; k++) {
    if (processes[k].getArivalTime() == CPUtime && processes[k].inserted == false) {
     q.add(processes[k]);
     processes[k].inserted = true;
     ATcounter++;
    }
   }
   Process p = q.remove();

   if (p.getStart() == -1) {
    p.setStart(CPUtime);
   }

   for (int j = 1; j <= intervalSize; j++) {
    if(p.getBurstTime()>0){
     p.setBurstTime(p.getBurstTime() - 1); // Assumption: BT > 0
    }

    CPUtime++;
    if (p.getBurstTime() == 0 && p.done==false) {
     p.done =true;
     p.setEnd(CPUtime);
     processes[p.getId() - 1] = p;
    }


    for (int k = 0; k < numOfP && ATcounter < 6; k++) {
     if (processes[k].getArivalTime() == CPUtime && processes[k].inserted == false) {
      q.add(processes[k]);
      processes[k].inserted = true;
      ATcounter++;
     }
    }
    if (p.getBurstTime() > 0 && j == intervalSize) {
     q.add(p);
     //p.flag = true;
    }

   } // for
  }// do
  while (!q.isEmpty());

 }// roundRobin

 public static void print(int numOfP) {
  for (int i = 1; i <= numOfP; i++) {
   System.out.println("P" + processes[i - 1].getId() + ": start = "
     + processes[i - 1].getStart() + " ,end = "
     + processes[i - 1].getEnd());
  }
 }

 public static Process[] getProcesses() {
  return processes;
 }

 public static void setProcesses(Process[] processes) {
  MainClass.processes = processes;
 }

}// Class