const express = require('express');
const multer = require('multer');
const path = require('path');
const cookieParser = require('cookie-parser');

const app = express();
const PORT = 8080;

app.use(cookieParser());

const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, './uploads/');
    },
    filename: (req, file, cb) => {
        const username = req.cookies.username;
        if (username) {
            const filename = username + '.jpg';
            cb(null, filename);
        } else {
            cb(new Error('Username cookie not found'));
        }
    }
});

const upload = multer({ storage: storage });

app.get('/Project/ProfilePage.html', (req, res) => {
    res.sendFile(path.join(__dirname, './ProfilePage.html'));
});

app.post('/Project', upload.single('image'), (req, res) => {
    res.send('Image uploaded successfully');
});

app.listen(PORT, () => {
    console.log(`Server is running on http://localhost/Project/ProfilePage.html`);
});
