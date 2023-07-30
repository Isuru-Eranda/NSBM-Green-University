#include<stdio.h>
int main()
{
    int price[10],max,min,sum=0,i;
    float avg;

    for(i=0;i<10;i++)
    {
        printf("Enter the value of Element %d: ",i+1);
        scanf("%d",&price[i]);
        sum=sum+price[i];
    }
    max=price[0];
    min=price[0];
    for(i=1;i<10;i++)
    {
        if(price[i]>max)
            max=price[i];
        if(price[i]<min)
            min=price[i];
    }

    avg=sum/10.0;
    printf("\n*************************\n");
    printf("\nThe maximum value is: %d\n",max);
    printf("The minimum value is: %d\n",min);
    printf("Average is: %.2f\n",avg);
}
