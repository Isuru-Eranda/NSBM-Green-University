#include <stdio.h>

int main()
{
 float F,c;

 printf("Enter the Temperature in Fahrenheit : ");
 scanf("%f",&F);

 c=(5.0/9.0)*(F-32);

 printf("The Temperature in Celsius is %.2f\n",c);
}
