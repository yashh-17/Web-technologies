import React from 'react';
import { useLocation } from 'react-router-dom';

function Welcome() {
  const location = useLocation();
  const { username } = location.state || { username: 'Guest' }; // Get username from state, default to 'Guest'

  return (
    <div>
      <h2>Welcome, {username}!</h2>
      <p>You have successfully logged in or registered.</p>
    </div>
  );
}

export default Welcome;
