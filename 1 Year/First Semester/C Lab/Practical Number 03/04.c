#include <stdio.h>

int main()
{
    const float PI = 3.14159;
    float Radius;

    printf("Enter the Radius of the Circle: ");
    scanf("%f",&Radius);

    printf("\nDiameter of the Circle : %.2f\n", 2*Radius);
    printf("Circumference of the Circle : %.2f\n", 2*PI*Radius);
    printf("Area of the Circle : %.2f\n", PI *Radius*Radius);

}

