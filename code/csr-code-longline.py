# BEFORE
if (rectangle.coordinate[1][0] - rectangle.coordinate[2][0] > 500 && rectangle.coordinate[2][1] - rectangle.coordinate[3][1] > 500 && rectangle.isSquare()):

# AFTER
if (rectangle.isSquare() && rectangle.width > 500):