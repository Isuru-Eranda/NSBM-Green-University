#include <stdio.h>

int main()
{
 int distance,time,speed;

 printf ("Enter the Distance Traveled in Meters :");
 scanf ("\n%d",&distance);
 printf ("Enter the time taken in seconds :");
 scanf ("\n%d",&time);

 speed = distance / time;

 printf("Average speed: %d\n",speed);
}
