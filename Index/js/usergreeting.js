document.addEventListener('DOMContentLoaded', function() {
    var greetingElement = document.getElementById('userGreeting');
    if (userName) {
        greetingElement.innerHTML = `Welcome, ${userName}!`;
    }
});
