#include <stdio.h>

int main()
{
    int Number, x;
    int Factorial = 1;

    printf("Enter a Number : ");
    scanf("%d",&Number);

    for (x = 1; x <= Number; x++)
    {
     Factorial = x * Factorial;
    }
  printf("\nFactorial of %d is = %d\n", Number, Factorial);
}

