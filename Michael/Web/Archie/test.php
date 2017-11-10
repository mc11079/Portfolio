<?php
$foundKeywords=array(1,2,3);
echo "<script>
    alert('New document added successfully! Keywords found:".json_encode($foundKeywords)."');

    window.location.href='addArticle.php';
</script>";