#include<stdio.h>

int main ()
{

char Employee_Name[20];

    int Basic_Salary,New_Salary,Increment;

    printf("Enter the Employee Name : ");
    scanf("%s",Employee_Name);
    printf("Enter Basic Salary : ");
    scanf("%d",&Basic_Salary);

    if (Basic_Salary>=10000){
        Increment= 0.15*Basic_Salary;
    }
    else if (Basic_Salary>=5000){
        Increment= 0.10*Basic_Salary;
    }
    else {
        Increment = 0.05*Basic_Salary;
    }

    New_Salary = Basic_Salary + Increment;

    printf("\nEmployee Name is: %s\n",Employee_Name);
    printf("New Salary is : %d\n",New_Salary);
}
