// Toggle between login and signup forms
function showAuthForm(formType) {
  document.getElementById('login-form').style.display = formType === 'login' ? 'block' : 'none';
  document.getElementById('signup-form').style.display = formType === 'signup' ? 'block' : 'none';
}

// Simulate authentication (replace with actual authentication logic)
document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault();
  authenticateUser();
});

document.getElementById('signup-form').addEventListener('submit', function(event) {
  event.preventDefault();
  authenticateUser();
});

function authenticateUser() {
  document.getElementById('auth-screen').style.display = 'none';
  document.getElementById('main-screen').style.display = 'block';
  showSection('dashboard');
}

// Show different sections of the main screen
function showSection(sectionId) {
  const sections = document.querySelectorAll('main section');
  sections.forEach(section => {
    section.style.display = section.id === sectionId ? 'block' : 'none';
  });
}

// Show profile (stub function)
function showProfile() {
  alert('Profile section is under construction.');
}

// Logout function
function logout() {
  document.getElementById('main-screen').style.display = 'none';
  document.getElementById('auth-screen').style.display = 'block';
}

// Generate random ID and password for meetings
function generateMeetingCredentials() {
  return {
    id: Math.random().toString(36).substr(2, 9),
    password: Math.random().toString(36).substr(2, 6)
  };
}

// Start video call
function startVideoCall() {
  const { id, password } = generateMeetingCredentials();
  document.getElementById('video-call-id').textContent = id;
  document.getElementById('video-call-password').textContent = password;
  showSection('call-screen');
  document.getElementById('video').style.display = 'block';
  document.getElementById('audio').style.display = 'none';
  // Access the user's video and audio devices
  navigator.mediaDevices.getUserMedia({ video: true, audio: true })
    .then(stream => {
      document.getElementById('video').srcObject = stream;
    })
    .catch(err => console.error('Error accessing media devices.', err));
}

// Join video call
function joinVideoCall() {
  const id = document.getElementById('join-video-id').value;
  const password = document.getElementById('join-video-password').value;
  // Validate meeting ID and password (replace with actual validation logic)
  if (id && password) {
    showSection('call-screen');
    document.getElementById('video').style.display = 'block';
    document.getElementById('audio').style.display = 'none';
    // Access the user's video and audio devices
    navigator.mediaDevices.getUserMedia({ video: true, audio: true })
      .then(stream => {
        document.getElementById('video').srcObject = stream;
      })
      .catch(err => console.error('Error accessing media devices.', err));
  } else {
    alert('Invalid Meeting ID or Password');
  }
}

// Start voice call
function startVoiceCall() {
  const { id, password } = generateMeetingCredentials();
  document.getElementById('voice-call-id').textContent = id;
  document.getElementById('voice-call-password').textContent = password;
  showSection('call-screen');
  document.getElementById('video').style.display = 'none';
  document.getElementById('audio').style.display = 'block';
  // Access the user's audio devices
  navigator.mediaDevices.getUserMedia({ audio: true })
    .then(stream => {
      document.getElementById('audio').srcObject = stream;
    })
    .catch(err => console.error('Error accessing media devices.', err));
}

// Join voice call
function joinVoiceCall() {
  const id = document.getElementById('join-voice-id').value;
  const password = document.getElementById('join-voice-password').value;
  // Validate meeting ID and password (replace with actual validation logic)
  if (id && password) {
    showSection('call-screen');
    document.getElementById('video').style.display = 'none';
    document.getElementById('audio').style.display = 'block';
    // Access the user's audio devices
    navigator.mediaDevices.getUserMedia({ audio: true })
      .then(stream => {
        document.getElementById('audio').srcObject = stream;
      })
      .catch(err => console.error('Error accessing media devices.', err));
  } else {
    alert('Invalid Meeting ID or Password');
  }
}

// Placeholder functions for call controls
function toggleMute() {
  alert('Mute/Unmute functionality is under construction.');
}

function showParticipants() {
  alert('Participants functionality is under construction.');
}

function showDashboard() {
  alert('Dashboard functionality is under construction.');
}

function showTranslation() {
  alert('Translation functionality is under construction.');
}

function endCall() {
  alert('Ending call...');
  showSection('dashboard');
}