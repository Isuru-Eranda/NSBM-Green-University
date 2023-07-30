#include <stdio.h>

int main()
{
    int Select_Number;
    float  Num1, Num2;


    printf("Menu\n");
    printf("\n1.Addition\n");
    printf("2.Subtraction\n");
    printf("3.Multiplication\n");
    printf("4.Division\n");
    printf("\nSelect Operator : ");
    scanf("%d",&Select_Number);

    printf("\nEnter the First Numbers  : ");
    scanf("%f",&Num1);

    printf("Enter the Second Numbers : ");
    scanf("%f",&Num2);

    switch (Select_Number)
    {
        case 1:
            printf("\nResult: %.2f\n",Num1 + Num2);
            break;
        case 2:
            printf("\nResult: %.2f\n",Num1 - Num2);
            break;
        case 3:
            printf("\nResult: %.2f\n",Num1 * Num2);
            break;
        case 4:
            if (Num2 != 0)
                printf("\nResult: %.2f\n",Num1 / Num2);
            else
                printf("\nError Message : Division by Zero is not Allowed.\n");
            break;
        default:
            printf("\nInvalid Selection !\n");
            break;
    }

}
