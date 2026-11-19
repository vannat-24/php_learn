<main>
<h1>from Post</h1>
<form action="store.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" onchange="handlePreview(this)"><br>
    <img id="preview" width="100px" alt=""> <br>
    <button type="submit">uploads</button>
</form>
</main>
<script>
    let preview =document.getElementById('preview');
    function handlePreview (input){
        let file = input.file[0];
        if(file){
            preview.src=URL.createObjectURL(file)
        }
    }
</script>