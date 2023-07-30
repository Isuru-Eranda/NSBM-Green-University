#include <stdio.h>

int main()
{
    int Number, Reversed_Number = 0, Remainder;

    printf("Enter the Number : ");
    scanf("%d",&Number);

    do
    {
       Remainder = Number % 10;
       Reversed_Number = Reversed_Number * 10 + Remainder;
       Number /= 10;
    }
    while (Number != 0);

    printf("\nReversed Number : %d\n", Reversed_Number);

}

