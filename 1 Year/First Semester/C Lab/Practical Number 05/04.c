#include <stdio.h>

int main()
{
    int Number, Sum = 0, Digit;

    printf("Enter a Number : ");
    scanf("%d",&Number);


    while (Number > 0)
    {
        Digit = Number % 10;
        Sum += Digit;
        Number /= 10;
    }

    printf("\nSum of the Digits: %d\n", Sum);

}

