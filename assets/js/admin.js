document.querySelectorAll(".fa-pen-to-square").forEach((value)=>{
    value.addEventListener("click", ()=>{
        location.href = "../admin/post.php";
    });
});
