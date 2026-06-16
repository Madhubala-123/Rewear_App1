import React from 'react';
import { useNavigate } from 'react-router-dom';
import './CustomerDashboard.css';

const CustomerDashboard = () => {
    const navigate = useNavigate();

    return (
        <div className="dashboard-body">
            <div className="dashboard-container">
                {/* TOPBAR */}
                <div className="topbar">
                    <div className="logo">
                        Re<span>Wear</span>
                    </div>
                    <div className="profile">
                        <div className="avatar">M</div>
                        <div className="username">Madhu</div>
                    </div>
                </div>

                {/* WELCOME */}
                <div className="welcome-box">
                    <div className="welcome-title">
                        Welcome Back, <span>Madhu 👋</span>
                    </div>

                    <div className="pickup-status">
                        <div className="pickup-left">
                            <h3>🛵 Pickup Boy On The Way</h3>
                            <p>Your pickup rider is arriving to collect old clothes.</p>
                        </div>
                        <div className="earnings">
                            <h2>₹1,240</h2>
                            <p>Total Earnings</p>
                        </div>
                    </div>
                </div>

                {/* CARDS */}
                <div className="card-grid">
                    <div className="card request-pickup-btn" onClick={() => navigate('/customer/pickup-request')}>
                        <div className="card-icon">📦</div>
                        <h2>Schedule Pickup</h2>
                        <p>Book pickup and earn instant cash.</p>
                    </div>

                    <div className="card" onClick={() => navigate('/customer/track-pickup')}>
                        <div className="card-icon">🛵</div>
                        <h2>Track Pickup</h2>
                        <p>Track rider and live updates.</p>
                    </div>

                    <div className="card" onClick={() => navigate('/customer/history')}>
                        <div className="card-icon">📜</div>
                        <h2>History</h2>
                        <p>View previous pickups and payments.</p>
                    </div>

                    <div className="card" onClick={() => navigate('/customer/wallet')}>
                        <div className="card-icon">💰</div>
                        <h2>Wallet</h2>
                        <p>Check earnings and rewards.</p>
                    </div>
                </div>

                {/* BOTTOM */}
                <div className="bottom-box">
                    <div className="bottom-left">
                        <h2>♻ Save Earth With ReWear</h2>
                        <p>Recycle clothes and build a greener future.</p>
                    </div>
                    <button className="book-btn" onClick={() => navigate('/customer/pickup-request')}>
                        Book Pickup
                    </button>
                </div>
            </div>
        </div>
    );
};

export default CustomerDashboard;
