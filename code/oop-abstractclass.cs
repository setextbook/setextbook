abstract class Shape
{
  public abstract int GetArea();
}

class Square : Shape
{
  int side;
  public Square(int n) => side = n;
  // GetArea method is required to avoid a compile-time error.
  public override int GetArea() => side * side;
  static void Main()
  {
    var sq = new Square(12);
    Console.WriteLine($"Area of the square = {sq.GetArea()}");
  }
}
// Output: Area of the square = 144