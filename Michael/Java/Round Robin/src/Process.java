public class Process {
 
 private int arivalTime;
 private int burstTime;
 private int start; 
 private int end;
 private int id; 
 boolean inserted;
 boolean done;

 
 public Process(int AT, int BT){
  arivalTime = AT; 
  burstTime = BT; 
  start = -1; 
  end = 0; 
  inserted=false;
  done = false; 
 }
 
 //*************Getters and Setters****************
 public int getArivalTime() {
  return arivalTime;
 }
 public void setArivalTime(int arivalTime) {
  this.arivalTime = arivalTime;
 }
 public int getBurstTime() {
  return burstTime;
 }
 public void setBurstTime(int burstTime) {
  this.burstTime = burstTime;
 }

 public int getStart() {
  return start;
 }

 public void setStart(int start) {
  this.start = start;
 }

 public int getEnd() {
  return end;
 }

 public void setEnd(int end) {
  this.end = end;
 }

 public int getId() {
  return id;
 }

 public void setId(int id) {
  this.id = id;
 }
 

}