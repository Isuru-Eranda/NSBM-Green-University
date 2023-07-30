#include <stdio.h>

int main()
 {
    int size;


    printf("Enter the size of the arrays: ");
    scanf("%d", &size);

    int array1[size], array2[size], scalarSum = 0;
    int vectorSum[size];


    printf("\nEnter %d integer values for Array 1:\n", size);
    for (int i = 0; i < size; i++) {
        scanf("%d", &array1[i]);
    }


    printf("\nEnter %d integer values for Array 2:\n", size);
    for (int i = 0; i < size; i++) {
        scanf("%d", &array2[i]);
    }


    for (int i = 0; i < size; i++) {
        scalarSum += array1[i] + array2[i];
    }


    for (int i = 0; i < size; i++) {
        vectorSum[i] = array1[i] + array2[i];
    }


    printf("\nScalar Sum: %d\n", scalarSum);

    printf("\nVector Sum (Resulting array): ");
    for (int i = 0; i < size; i++) {
        printf("%d ", vectorSum[i]);
    }
    printf("\n");

}

