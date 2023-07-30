#include <stdio.h>

  int main()
{
  int M_No;
  printf("Enter Month Number : ");
  scanf("%d",&M_No);

  switch(M_No)
  {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
       printf("\n31 Days in the %d Month\n",M_No);break;
    case 4:
    case 6:
    case 9:
    case 11:
       printf("\n30 Days in the %d Month\n",M_No);
    break;

    case 2:
       printf("\n28 Days in the %d Month\n",M_No);
    break;

    default:
       printf("\nEntered Month Number is Invalid !\n");
  }
}
