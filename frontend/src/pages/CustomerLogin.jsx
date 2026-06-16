import React, { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import './CustomerLogin.css';

const CustomerLogin = () => {
    const navigate = useNavigate();
    const [phone, setPhone] = useState('');
    const [otp, setOtp] = useState('');
    const [demoOtp, setDemoOtp] = useState(null);

    const handleSendOtp = async () => {
        if (!phone) return alert('Please enter phone number');
        
        try {
            const res = await fetch('http://localhost:5000/api/auth/send-otp', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ phone })
            });
            const data = await res.json();
            if (data.success) {
                setDemoOtp(data.otp);
            }
        } catch (err) {
            console.error(err);
            // Fallback for frontend-only testing
            setDemoOtp(Math.floor(1000 + Math.random() * 9000));
        }
    };

    const handleLogin = async () => {
        if (!otp) return alert('Please enter OTP');
        
        try {
            const res = await fetch('http://localhost:5000/api/auth/login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ phone, otp })
            });
            const data = await res.json();
            if (data.success) {
                navigate('/customer/dashboard');
            }
        } catch (err) {
            console.error(err);
            navigate('/customer/dashboard');
        }
    };

    return (
        <div className="login-body">
            {/* GLOW */}
            <div className="glow"></div>

            {/* LOGIN BOX */}
            <div className="login-box">
                <h1>
                    Re<span>Wear</span>
                </h1>

                <p className="subtitle">
                    CUSTOMER LOGIN
                </p>

                <div className="input-box">
                    <div className="otp-row">
                        <input 
                            type="text" 
                            placeholder="Enter Phone Number"
                            value={phone}
                            onChange={(e) => setPhone(e.target.value)}
                        />
                        <button className="otp-btn" onClick={handleSendOtp}>
                            Send OTP
                        </button>
                    </div>

                    <input 
                        type="text" 
                        placeholder="Enter OTP"
                        value={otp}
                        onChange={(e) => setOtp(e.target.value)}
                    />

                    <div className="demo">
                        Demo OTP: {demoOtp || 'Click Send OTP'}
                    </div>

                    <button className="login-btn" onClick={handleLogin}>
                        Login
                    </button>
                </div>

                <div className="register">
                    First time user? <Link to="/customer/register">Register Here</Link>
                </div>

                <div className="back">
                    <Link to="/select-role">← Back to Role Selection</Link>
                </div>
            </div>
        </div>
    );
};

export default CustomerLogin;
