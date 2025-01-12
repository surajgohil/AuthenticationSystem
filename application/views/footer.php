<script>
    function changePage(page){
        $.ajax({
            url: `<?= base_url() ?>checkToken`,
            type: 'POST',
            headers: {
                'Authorization': localStorage.getItem('token'),
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === true) {
                    window.location.href = page;
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