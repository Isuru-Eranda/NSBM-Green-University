#include <stdio.h>

int main()
 {
 int intValue;
 float floatValue;
 double doubleValue;
 char charValue;

 printf("Enter an integer : ");
 scanf("%d", &intValue);

 printf("Enter a float : ");
 scanf("%f", &floatValue);

 printf("Enter a double : ");
 scanf("%lf", &doubleValue);

 printf("Enter a character : ");
 scanf(" %c", &charValue);

 printf("\nInteger value : %d\n", intValue);
 printf("Float value : %.2f\n", floatValue);
 printf("Double value : %.2lf\n", doubleValue);
 printf("Character value : %c\n", charValue);

}
