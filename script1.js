function generateDetails() {
    // Generate random meeting link
    const randomLink = 'https://meeting.example.com/${Math.random().toString(36).substring(2, 10)}';
    document.getElementById('meeting-link').value = randomLink;

    // Generate random meeting ID
    const meetingID = Math.random().toString(36).substring(2, 10).toUpperCase();
    document.getElementById('meeting-id').value = meetingID;

    // Generate random meeting password of length 8
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let password = '';
    for (let i = 0; i < 8; i++) {
        password += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    document.getElementById('meeting-password').value = password;
}

function createCall() {
    // Handle the create call functionality
    alert('Call created successfully!');
}

function showProfile() {
    // Handle the show profile functionality
    alert('Showing profile!');
}

function logout() {
    // Handle the logout functionality
    alert('Logged out!');
}