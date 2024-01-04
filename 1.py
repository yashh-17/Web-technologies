import cv2
import numpy as np

# Load two images of the same size (you can use different images)
image1 = cv2.imread('input.png')
image2 = cv2.imread('input.png')

# Check if the images were loaded successfully
if image1 is None or image2 is None:
    print("Error: Could not open or find one of the images.")
else:
    # Ensure both images have the same dimensions
    if image1.shape == image2.shape:
        # Perform image arithmetic and logical operations


        # Image Addition
        addition_result = cv2.add(image1, image2)

        # Image Subtraction
        subtraction_result = cv2.subtract(image1, image2)

        # Bitwise AND
        bitwise_and_result = cv2.bitwise_and(image1, image2)

        # Bitwise OR
        bitwise_or_result = cv2.bitwise_or(image1, image2)

        # Bitwise NOT (Invert image1)
        bitwise_not_result = cv2.bitwise_not(image1)

        # Display the original and enhanced images
        cv2.imshow('Image1', image1)
        cv2.imshow('Image2', image2)
        cv2.imshow('Addition Result', addition_result)
        cv2.imshow('Subtraction Result', subtraction_result)
        cv2.imshow('Bitwise AND Result', bitwise_and_result)
        cv2.imshow('Bitwise OR Result', bitwise_or_result)
        cv2.imshow('Bitwise NOT (Invert Image1)', bitwise_not_result)

        # Save the enhanced images
        cv2.imwrite('addition_result1.jpg', addition_result)
        cv2.imwrite('subtraction_result1.jpg', subtraction_result)
        cv2.imwrite('bitwise_and_result1.jpg', bitwise_and_result)
        cv2.imwrite('bitwise_or_result1.jpg', bitwise_or_result)
        cv2.imwrite('bitwise_not_result1.jpg', bitwise_not_result)

        # Wait for a key press and then close the display windows
        cv2.waitKey(0)
        cv2.destroyAllWindows()
    else:
        print("Error: The two images must have the same dimensions.")
