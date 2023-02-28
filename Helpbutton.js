//original code for help button
const helpBtn = document.getElementById("helpBtn");
helpBtn.addEventListener("click", function() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                alert('Error: ' + xhr.status);
            }
        }
    };
    xhr.open('GET', 'textalert.py', true);
    xhr.send();
});

// simplified code

/*
const helpBtn = document.getElementById("helpBtn");
helpBtn.addEventListener("click", function() {
    fetch('textalert.py').then(response => {
        if (response.ok) {
            return response.text();
        }
*/