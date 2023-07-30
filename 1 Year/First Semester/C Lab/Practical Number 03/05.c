#include<stdio.h>

int main ()
{

int Num1,Num2;

    printf("Enter First Number : ");
    scanf("%d",&Num1);

    printf("Enter Second Number: ");
    scanf("%d",&Num2);

    if(Num1%Num2==0) {
        printf("\n%d is a Multiple of %d\n",Num1,Num2);
    }else {
        printf("\n%d is not a Multiple of %d\n",Num1,Num2);
    }
}
