// // JavaScript to handle link clicks and display content
// document.addEventListener('DOMContentLoaded', function () {
//     var links = document.querySelectorAll('.sidebar a');
//     var content = document.querySelector('.content');

//     links.forEach(function (link) {
//         link.addEventListener('click', function (e) {
//             e.preventDefault();
//             var target = this.getAttribute('href').substring(1);
//             content.innerHTML = '<h2>' + target + ' Content</h2>';
//         });
//     });
// });

function showContent(content) {
    var mainContent = document.getElementById('main-content');

    switch(content) {
        case 'home':
            fetch('../php/home.php')
                .then(response => response.text())
                .then(data => mainContent.innerHTML = data);
            break;
        case 'users':
            fetch('../php/users.php')
                .then(response => response.text())
                .then(data => mainContent.innerHTML = data);
            break;
        case 'booking':
            fetch('../php/bookingHistory.php')
                .then(response => response.text())
                .then(data => mainContent.innerHTML = data);
            break;
        default:
            mainContent.innerHTML = '';
    }
}
// Show home content by default
showContent('home');

