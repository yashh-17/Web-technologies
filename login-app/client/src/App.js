// Import necessary modules from React
import React from 'react';
// Import the Login and Signup components
import Login from './Login';
import Signup from './Signup';

// Define the main App component
function App() {
  return (
    <div className="App"> {/* Main container for the app */}
      <h1>Welcome to Our App</h1> {/* Header for the app */}
      <Signup /> {/* Render the Signup component */}
      <Login /> {/* Render the Login component */}
    </div>
  );
}

// Export the App component for use in the index.js file
export default App;
