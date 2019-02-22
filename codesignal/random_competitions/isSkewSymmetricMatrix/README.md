A square matrix that is the negative of its transpose is a skew-symmetric matrix. Find out if the given matrix is skew-symmetric.

Example

For

matrix = [[ 0, 0,  1], 
          [ 0, 0, -2], 
          [-1, 2,  0]]
the output should be
isSkewSymmetricMatrix(matrix) = true;

For

matrix = [[ 0,  0,  1], 
          [ 0,  0, -2], 
          [-1, -2,  0]]
the output should be
isSkewSymmetricMatrix(matrix) = false.

Input/Output

[execution time limit] 4 seconds (php)

[input] array.array.integer matrix

2-dimensional array of integers representing a square matrix.

Guaranteed constraints:
1 ≤ matrix.length ≤ 5,
matrix[i].length = matrix.length,
-10 ≤ matrix[i][j] ≤ 10.

[output] boolean

true if matrix is a skew-symmetric matrix, false otherwise.
