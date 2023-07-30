
#include <stdio.h>

int main()
{
    int Select_Number;
    float Radius, PI;

    printf("Menu\n\n");
    printf("1.Calculate the Circumference of a Circle.\n");
    printf("2.Calculate the Area of a Circle.\n");
    printf("3.Calculate the Volume of a Sphere.\n");
    printf("\nSelect Operator : ");
    scanf("%d", &Select_Number);

    printf("\nEnter the Radius : ");
    scanf("%f", &Radius);

    PI = 3.14159;

    switch (Select_Number)
    {
        case 1:
            printf("\nCircumference of the Circle : %.2f\n", 2 * PI * Radius);
            break;
        case 2:
            printf("\nArea of the Circle : %.2f\n", PI * Radius * Radius);
            break;
        case 3:
            printf("\nVolume of the Sphere : %.2f\n", (4.0/3.0) * PI * Radius * Radius * Radius);
            break;
        default:
            printf("\nInvalid Selection !\n");
            break;
    }
}
