#include<stdio.h>

int main ()
{
  int Years,Basic_Salary,Monthly_Sales;
  double Gross_Monthly;
  char from;

    printf("Enter Working Years : ");
    scanf("%d",&Years);

    printf("Enter Basic Salary  : ");
    scanf("%d",&Basic_Salary);

    printf("Enter Monthly Sales : ");
    scanf("%d",&Monthly_Sales);

    printf("Salesman Working in Colombo ?(Enter 'C' for Colombo or any Other character for other Cities): ");
    scanf(" %c",&from);

    if(Years>5) {
        Gross_Monthly = Basic_Salary + Basic_Salary*0.1;
    }else {
        Gross_Monthly = Basic_Salary;
    }
    if(from == 'C') {
        Gross_Monthly += 2500;
    }
    if(Monthly_Sales>=50000) {
        Gross_Monthly += Monthly_Sales*0.15;
    }else if(Monthly_Sales>=25000) {
        Gross_Monthly += Monthly_Sales*0.12;
    }else {
        Gross_Monthly += Monthly_Sales*0.1;
    }
    printf("\nGross Monthly Remuneration is Rs.%.2f\n",Gross_Monthly);
}

