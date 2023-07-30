#include<stdio.h>

int main()
{
    char Alphabet[]="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for(int x = 0; x < 26; ++x)
    {
     printf("'%c' ASCII Value => %d\n",Alphabet[x],Alphabet[x]);
    }
}

