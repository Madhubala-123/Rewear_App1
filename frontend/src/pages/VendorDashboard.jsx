import React from 'react';
import { useNavigate, Link } from 'react-router-dom';
import './VendorDashboard.css';

const VendorDashboard = () => {
    const navigate = useNavigate();

    return (
        <div className="vendor-dashboard-body">
            <div className="dashboard vendor-dashboard-container">
                {/* TOP */}
                <div className="top">
                    <div className="logo">
                        Re<span>Wear</span>
                    </div>
                    <div className="profile">
                        <h3>Vendor</h3>
                        <p>GreenTex Industries</p>
                    </div>
                </div>

                {/* STATS */}
                <div className="stats">
                    <div className="card stat-card">
                        <h1>520KG</h1>
                        <p>Total Stock</p>
                    </div>
                    <div className="card stat-card">
                        <h1>18</h1>
                        <p>Pending Orders</p>
                    </div>
                    <div className="card stat-card">
                        <h1>42</h1>
                        <p>Completed Exports</p>
                    </div>
                    <div className="card stat-card">
                        <h1>₹48K</h1>
                        <p>Total Earnings</p>
                    </div>
                </div>

                {/* TITLE */}
                <div className="section-title">
                    Clothes Requests
                </div>

                {/* REQUESTS */}
                <div className="requests">
                    {/* CARD 1 */}
                    <div className="request-card">
                        <h2>Thrift Store Order</h2>
                        <div className="location">📍 Bangalore</div>
                        <div className="clothes">
                            Jeans • Hoodies • Jackets • Cotton Wear
                        </div>
                        <button className="action-btn view-stock-btn" onClick={() => navigate('/vendor/stock')}>
                            View Details →
                        </button>
                    </div>

                    {/* CARD 2 */}
                    <div className="request-card">
                        <h2>Export Request</h2>
                        <div className="location">📍 Mumbai Port</div>
                        <div className="clothes">
                            Winter Wear • Woolen Clothes • Bulk Shirts
                        </div>
                        <button className="action-btn" onClick={() => navigate('/vendor/export')}>
                            View Details →
                        </button>
                    </div>

                    {/* CARD 3 */}
                    <div className="request-card">
                        <h2>Recycling Industry</h2>
                        <div className="location">📍 Chennai</div>
                        <div className="clothes">
                            Damaged Clothes • Cotton Waste • Textile Scrap
                        </div>
                        <button className="action-btn" onClick={() => navigate('/vendor/orders')}>
                            View Details →
                        </button>
                    </div>
                </div>

                {/* BUTTONS */}
                <div className="button-section">
                    <button className="main-btn" onClick={() => navigate('/vendor/payments')}>
                        💰 View Payments
                    </button>
                    <button className="main-btn" onClick={() => navigate('/vendor/profile')}>
                        👤 View Profile
                    </button>
                    <button className="main-btn" onClick={() => navigate('/vendor/notifications')}>
                        🔔 Notifications
                    </button>
                </div>

                {/* BACK */}
                <div className="back">
                    <Link to="/select-role">← Back To Role Selection</Link>
                </div>
            </div>
        </div>
    );
};

export default VendorDashboard;
