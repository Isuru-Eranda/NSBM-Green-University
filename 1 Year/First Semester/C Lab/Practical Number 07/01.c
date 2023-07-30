#include<stdio.h>

int main()
{
    int T1[3][3]={{3,2,4},{1,4,6},{4,3,2}};
    int T2[3][3]={{2,6,3},{4,3,2},{5,1,7}};
    int T3[3][3],c=0,r=0;

    for(r=0;r<3;r++)
    {
        printf("\t");
        for(c=0;c<3;c++)
        {
            printf("%d  ",T1[r][c]);
        }
        printf("\t");
        for(c=0;c<3;c++)
        {
            printf("%d  ",T2[r][c]);
        }
        printf("\t");
        for(c=0;c<3;c++)
        {
            //T3[r][c]=T1[r][c]+T2[r][c];
            printf("%d  ",T1[r][c]+T2[r][c]);
        }
        printf("\n ");
    }
}
