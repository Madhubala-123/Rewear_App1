import express from 'express';
import cors from 'cors';


const app = express();
const port = process.env.PORT || 5000;

app.use(cors());
app.use(express.json());

// Mock Data
let requests = [];

// Auth API mock (send OTP)
app.post('/api/auth/send-otp', (req, res) => {
    const { phone } = req.body;
    const otp = Math.floor(1000 + Math.random() * 9000);
    res.json({ success: true, otp: otp, message: 'OTP sent successfully' });
});

app.post('/api/auth/login', (req, res) => {
    const { phone, otp } = req.body;
    res.json({ success: true, message: 'Login successful' });
});

// Other basic endpoints
app.get('/api/requests', (req, res) => {
    res.json(requests);
});

app.post('/api/requests', (req, res) => {
    const newReq = { id: Date.now(), ...req.body, status: 'pending' };
    requests.push(newReq);
    res.json({ success: true, data: newReq });
});

app.listen(port, () => {
    console.log(`Server is running on port: ${port}`);
});
