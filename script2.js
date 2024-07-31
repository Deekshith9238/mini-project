document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded and parsed');
    
    function joinCall() {
        console.log('joinCall function triggered');
        const meetingID = document.getElementById('join-meeting-id').value;
        const meetingPassword = document.getElementById('join-meeting-password').value;

        if (meetingID && meetingPassword) {
            alert(`Joining call with ID: ${meetingID}`);
        } else {
            alert('Please enter both Meeting ID and Password.');
        }
    }

    function showProfile() {
        console.log('showProfile function triggered');
        alert('Profile page is not implemented yet.');
        // Example of redirecting to a profile page
        // window.location.href = 'profile.html';
    }

    function logout() {
        console.log('logout function triggered');
        alert('You have been logged out.');
        // Example of redirecting to a login page
        // window.location.href = 'login.html';
    }

    // Attach functions to buttons
    document.getElementById('profile-btn').addEventListener('click', showProfile);
    document.getElementById('logout-btn').addEventListener('click', logout);
    document.getElementById('join-btn').addEventListener('click', joinCall);
});
