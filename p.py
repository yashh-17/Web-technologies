def can_decorate_tree(leaves, large_ornaments, small_ornaments):
    # Condition 1: Each leaf needs 1 large ornament and 3 small ornaments or 2 large ornaments
    large_needed = leaves * 2  # Large ornaments needed if each leaf needs 2 large ornaments
    small_needed = leaves * 4  # Small ornaments needed if each leaf needs 1 large and 3 small ornaments

    # Check if available ornaments satisfy the requirements
    return (large_ornaments >= large_needed) or (large_ornaments >= leaves and small_ornaments >= small_needed)


# Read the number of test cases
num_test_cases = int(input("Enter the number of test cases: "))

for _ in range(num_test_cases):
    # Read inputs for each test case
    leaves, large, small = map(int, input().split())

    # Check if the tree can be decorated beautifully for each test case
    result = "YES" if can_decorate_tree(leaves, large, small) else "NO"
    print(result)
