import React, { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import './CustomerLogin.css';

const VendorLogin = () => {
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
            setDemoOtp(Math.floor(1000 + Math.random() * 9000));
        }
    };

    const handleLogin = async () => {
        if (!otp) return alert('Please enter OTP');
        navigate('/vendor/dashboard');
    };

    return (
        <div className="login-body">
            <div className="glow"></div>
            <div className="login-box">
                <h1>Re<span>Wear</span></h1>
                <p className="subtitle">VENDOR LOGIN</p>

                <div className="input-box">
                    <div className="otp-row">
                        <input 
                            type="text" 
                            placeholder="Enter Phone Number"
                            value={phone}
                            onChange={(e) => setPhone(e.target.value)}
                        />
                        <button className="otp-btn" onClick={handleSendOtp}>Send OTP</button>
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

                    <button className="login-btn" onClick={handleLogin}>Login</button>
                </div>

                <div className="register">
                    First time vendor? <Link to="/vendor/register">Register Here</Link>
                </div>

                <div className="back">
                    <Link to="/select-role">← Back To Role Selection</Link>
                </div>
            </div>
        </div>
    );
};

export default VendorLogin;
