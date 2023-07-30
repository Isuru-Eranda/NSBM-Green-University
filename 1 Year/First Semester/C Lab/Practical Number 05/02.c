#include <stdio.h>

int main()
{
    int Marks[10];
    int x, Total=0;
    float Average;

    printf("Enter the 10 Marks\n\n");

    for (x = 0; x < 10; x++)
    {
        printf("Enter Mark %d : ",x+1);
        scanf("%d", &Marks[x]);
        Total += Marks[x];
    }

    Average = (float)Total / 10;

    printf("\nTotal Marks : %d\n",Total);
    printf("Average Marks : %.2f\n",Average);

    if (Average < 50)
    {
        printf("\nFail\n");
    }
    else
    {
        printf("\nPass\n");
    }

}

