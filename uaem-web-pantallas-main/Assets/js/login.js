fetch('./templates/header.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('headerContainer').innerHTML = data;
            });
        fetch('./templates/footer.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('footerContainer').innerHTML = data;
            });