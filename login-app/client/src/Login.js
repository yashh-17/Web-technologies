// Import necessary modules and hooks from React
import React, { useState } from 'react';
import axios from 'axios'; // Import axios for making HTTP requests

// Define the Login component
function Login() {
  // Set up state variables for username and password
  const [username, setUsername] = useState(''); // Holds the username input
  const [password, setPassword] = useState(''); // Holds the password input

  // Function to handle the login form submission
  const handleLogin = async (e) => {
    e.preventDefault(); // Prevent the default form submission behavior
    try {
      // Make a POST request to the login endpoint
      const response = await axios.post('http://localhost:5000/auth/login', {
        username, // Send the username
        password, // Send the password
      });
      // Alert the user if login is successful
      alert('Login successful');
      // TODO: Handle successful login (e.g., store token, redirect user, etc.)
    } catch (error) {
      // Alert the user if login fails
      alert('Login failed');
    }
  };

  return (
    <div>
      <h2>Login</h2> {/* Header for the login form */}
      <form onSubmit={handleLogin}> {/* Attach the handleLogin function to form submission */}
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
        <button type="submit">Login</button> {/* Button to submit the form */}
      </form>
    </div>
  );
}

// Export the Login component for use in other parts of the application
export default Login;
