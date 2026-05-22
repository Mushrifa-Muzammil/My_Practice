#include <stdio.h>

int main() {
    int i, j, rows;
    printf("Enter the number of rows: ");
    scanf("%d", &rows);

    for(i = 1; i <= rows; i++) {
        // Print leading spaces
        for(j = 1; j <= rows - i; j++) {
            printf(" ");
        }

        // Print increasing numbers
        int num = i;
        for(j = 1; j <= i; j++) {
            printf("%d ", num++);
        }

        // Print decreasing numbers
        num -= 2;
        for(j = 1; j < i; j++) {
            printf("%d ", num--);
        }

        printf("\n");
    }

    return 0;
}
