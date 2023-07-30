#include<stdio.h>

int main()
{
 int num1, num2, num3;

    int Largest, Smallest;

    printf("Enter the Three Integer Numbers : ");
    scanf("%d%d%d",&num1,&num2,&num3);

    Largest = num1;
    if (Largest < num2) {
        Largest = num2;
    }
    if (Largest < num3) {
        Largest = num3;
    }

    Smallest = num1;
    if (Smallest > num2) {
        Smallest = num2;
    }
    if (Smallest > num3) {
        Smallest = num3;
    }

    printf("\nLargest Number  : %d\n",Largest);
    printf("Smallest Number : %d\n",Smallest);
}

