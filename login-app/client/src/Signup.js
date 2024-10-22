// Import necessary modules and hooks from React
import React, { useState } from 'react';
import axios from 'axios'; // Import axios for making HTTP requests

// Define the Signup component
function Signup() {
  // Set up state variables for username and password
  const [username, setUsername] = useState(''); // Holds the username input
  const [password, setPassword] = useState(''); // Holds the password input

  // Function to handle the signup form submission
  const handleSignup = async (e) => {
    e.preventDefault(); // Prevent the default form submission behavior
    try {
      // Make a POST request to the signup endpoint
      const response = await axios.post('http://localhost:5000/auth/register', {
        username, // Send the username
        password, // Send the password
      });
      // Alert the user if signup is successful
      alert('Signup successful');
    } catch (error) {
      // Alert the user if signup fails
      alert('Signup failed');
    }
  };

  return (
    <div>
      <h2>Signup</h2>
      <form onSubmit={handleSignup}> {/* Attach the handleSignup function to form submission */}
        <input
          type="text" // Input field for username
          placeholder="Username" // Placeholder text for the username input
          value={username} // Set the input value to the username state
          onChange={(e) => setUsername(e.target.value)} // Update username state on input change
        />
        <br />
        <input
          type="password" // Input field for password
          placeholder="Password" // Placeholder text for the password input
          value={password} // Set the input value to the password state
          onChange={(e) => setPassword(e.target.value)} // Update password state on input change
        />
        <br />
        <button type="submit">Signup</button> {/* Button to submit the form */}
      </form>
    </div>
  );
}

// Export the Signup component for use in other parts of the application
export default Signup;
