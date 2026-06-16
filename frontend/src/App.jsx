import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Splash from './pages/Splash';
import Language from './pages/Language';
import SelectRole from './pages/SelectRole';
import CustomerLogin from './pages/CustomerLogin';
import CustomerDashboard from './pages/CustomerDashboard';
import PickupRequest from './pages/PickupRequest';
import AgentLogin from './pages/AgentLogin';
import VendorLogin from './pages/VendorLogin';
import AgentDashboard from './pages/AgentDashboard';
import VendorDashboard from './pages/VendorDashboard';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Splash />} />
        <Route path="/language" element={<Language />} />
        <Route path="/select-role" element={<SelectRole />} />
        <Route path="/customer/login" element={<CustomerLogin />} />
        <Route path="/customer/dashboard" element={<CustomerDashboard />} />
        <Route path="/customer/pickup-request" element={<PickupRequest />} />
        <Route path="/agent/login" element={<AgentLogin />} />
        <Route path="/vendor/login" element={<VendorLogin />} />
        <Route path="/agent/dashboard" element={<AgentDashboard />} />
        <Route path="/vendor/dashboard" element={<VendorDashboard />} />
        {/* We will add more routes here as we migrate other pages */}
      </Routes>
    </Router>
  );
}

export default App;
