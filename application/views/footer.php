<script>
    function changePage(page){
        $.ajax({
            url: `<?= base_url() ?>${page}`,
            type: 'POST',
            headers: {
                'Authorization': localStorage.getItem('token'),
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === true) {
                    window.location.href = response.data.redirect;
                } else {
                    alert(response.message);
                }
            },
            error: function(err) {
                console.log(err.responseText);
            }
        });
    }
</script>
</body>
</html>