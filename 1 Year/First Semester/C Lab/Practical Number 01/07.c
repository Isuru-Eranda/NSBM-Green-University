#include <stdio.h>

int main()
{
 int num1,num2;

 printf("Enter the First Number : ");
 scanf("%d", &num1);
 printf("Enter the Second Number : ");
 scanf("%d", &num2);

 int temp = num1;
 num1 = num2;
 num2 = temp;

 printf("\nAfter Swap\n");
 printf("\nNumber 1: %d\n", num1);
 printf("Number 2: %d\n", num2);
}
