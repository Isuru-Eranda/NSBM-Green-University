#include<stdio.h>

int main ()
{
  int num1,num2;

    printf("Enter First Number  : ");
    scanf("%d",&num1);
    printf("Enter Second Number : ");
    scanf("%d",&num2);

    if(num1<num2) {
        printf("\nHighest: %d\n",num2);
    }else if(num2<num1){
        printf("\nHighest: %d\n",num1);
    }else{
        printf("\nThis Numbers are Equal.\n");
    }
}
