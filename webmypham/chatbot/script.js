function sendMessage() {
    var message = document.getElementById('chat-input').value;
    if (message.trim() !== '') {
        displayMessage(message, 'user');
        document.getElementById('chat-input').value = '';

        // Gửi yêu cầu AJAX để xử lý tin nhắn từ người dùng
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'chatbot.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                displayMessage(response, 'chatbot');
            }
        };
        xhr.send('message=' + message);
    }
}

function displayMessage(message, sender) {
    var chatDisplay = document.getElementById('chat-display');
    var messageDiv = document.createElement('div');
    messageDiv.classList.add(sender);
    messageDiv.innerHTML = message;
    chatDisplay.appendChild(messageDiv);
    chatDisplay.scrollTop = chatDisplay.scrollHeight;
}
