

	import java.util.Scanner;
	public class Ex3 {

		public static void main(String[] args) {

			  long num = 0;

			  Scanner input = new Scanner(System.in);
			  System.out.println("Please enter a decimal number:");
			  num = input.nextInt();
			  System.out.println("The binary representaion is: " + decimalToBinary(num));

			  input.close();
			 }

			 public static long decimalToBinary(long num) {
			     if (num == 0)
			         return 0;
			     else
			         return (  10 * decimalToBinary(num / 2)+num % 2);
			 }
	}


