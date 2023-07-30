#include <stdio.h>

int main()
{
    char Cha;

    printf("Enter the Character : ");
    scanf("%c",&Cha);

    switch (Cha)
    {
        case 'A':
        case 'a':
        case 'E':
        case 'e':
        case 'I':
        case 'i':
        case 'O':
        case 'o':
        case 'U':
        case 'u':
            printf("%c is a Vowel.\n", Cha);
            break;
        default:
            printf("%c is not a Vowel.\n", Cha);
            break;
    }
}

