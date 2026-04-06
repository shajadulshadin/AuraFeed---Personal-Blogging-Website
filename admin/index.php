<?php
session_start();
require "../includes/configuration.php";

if(!isset($_SESSION['authentication'])){
    header("Location: ../index.php");
    exit();
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $deleteStmt = $connection->prepare("DELETE FROM blog_post WHERE id = ?");
    if ($deleteStmt->execute([$id])) {
        header("Location: index.php?msg=deleted");
        exit();
    }
}

if (isset($_POST['update_post'])) {
    $id = $_POST['post_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $status = $_POST['status'];

    $updateStmt = $connection->prepare("UPDATE blog_post SET title = ?, author = ?, status = ? WHERE id = ?");
    if ($updateStmt->execute([$title, $author, $status, $id])) {
        header("Location: index.php?msg=updated");
        exit();
    }
}

if (isset($_GET['fetch_id'])) {
    $id = $_GET['fetch_id'];
    $fetchStmt = $connection->prepare("SELECT * FROM blog_post WHERE id = ?");
    $fetchStmt->execute([$id]);
    $post = $fetchStmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($post);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuraFeed | Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

    <header class="bg-danger py-3">
        <div class="header-container container-fluid d-flex align-items-center justify-content-between">
            <a href="index.php" class="letter-spacing-1 fw-bold text-white fs-3 text-decoration-none">AuraFeed</a>
            <div class="admin-header-right">
                <a href="../index.php" target="_blank" class="text-decoration-none text-white fs-4 fw-bold me-4 letter-spacing-1">Front-end</a>
                <a href="post.php" class="text-decoration-none text-white fs-4 fw-bold me-4 letter-spacing-1">+ New Post</a>
                <a href="../includes/functions.php?logout=1" class="text-decoration-none text-white bg-dark fs-4 border-0 px-4 py-2 fw-bold py-1 rounded">Log out</a>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <?php if(isset($_GET['msg'])): ?>
            <div class="alert alert-success fs-5 text-center">
                Post was successfully <?php echo $_GET['msg']; ?>!
            </div>
        <?php endif; ?>

        <form id="adminSearchForm" class="mt-4 d-flex align-items-center">
            <input type="text" id="adminSearchInput" placeholder="Search post by title..."
                class="w-100 fs-3 letter-spacing-1 rounded-start border px-4 py-3"
                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit" class="fs-3 border px-4 py-3 text-white fw-bold bg-danger rounded-end">Search</button>
        </form>
    </div>

    <div class="container-fluid px-5">
        <h1 class="my-5 text-center fs-1">Manage Content</h1>
        <table class="w-100 fs-4 text-center table table-hover">
            <thead class="bg-danger text-white">
                <tr>
                    <th class="py-4">ID</th>
                    <th class="py-4">Post Title</th>
                    <th class="py-4">Author</th>
                    <th class="py-4">Status</th>
                    <th class="py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $search = isset($_GET['search']) ? "%".$_GET['search']."%" : "%";
                    $loadQuery = $connection->prepare("SELECT * FROM blog_post WHERE title LIKE ? ORDER BY id DESC");
                    $loadQuery->execute([$search]);
                    $blogs = $loadQuery->fetchAll(PDO::FETCH_ASSOC);

                    foreach($blogs as $post): ?>
                        <tr>
                            <td class="py-4"><?php echo $post['id'];?></td>
                            <td class="text-start py-4"><?php echo htmlspecialchars($post['title']);?></td>
                            <td class="py-4"><?php echo htmlspecialchars($post['author']);?></td>
                            <td class="py-4">
                                <?php echo ($post["status"] == 1) ? '<span class="badge bg-success">Published</span>' : '<span class="badge bg-warning text-dark">Saved</span>'; ?>
                            </td>
                            <td class="py-4">
                                <i class="fa-regular fa-trash-can text-danger me-3 btn-delete" data-id="<?php echo $post['id']; ?>" role="button"></i>
                                <i class="fa-regular fa-pen-to-square text-primary btn-edit" data-id="<?php echo $post['id']; ?>" role="button"></i>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="index.php" method="POST" class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title fs-3">Edit Post</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body fs-4">
                    <input type="hidden" name="post_id" id="edit_post_id">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" id="edit_title" class="form-control fs-4" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" id="edit_author" class="form-control fs-4" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" id="edit_status" class="form-select fs-4">
                            <option value="1">Published</option>
                            <option value="0">Saved (Draft)</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="update_post" class="btn btn-danger fs-4">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f7d8998257.js" crossorigin="anonymous"></script>
    
    <script>
        document.getElementById("adminSearchForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const val = document.getElementById("adminSearchInput").value.trim();
            window.location.href = val ? "index.php?search=" + encodeURIComponent(val) : "index.php";
        });

        const editModal = new bootstrap.Modal(document.getElementById('editModal'));

        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("btn-delete")) {
                const id = e.target.getAttribute("data-id");
                if (confirm("Delete post #" + id + "?")) window.location.href = "index.php?delete_id=" + id;
            }

            if (e.target.classList.contains("btn-edit")) {
                const id = e.target.getAttribute("data-id");
                
                fetch(`index.php?fetch_id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById("edit_post_id").value = data.id;
                        document.getElementById("edit_title").value = data.title;
                        document.getElementById("edit_author").value = data.author;
                        document.getElementById("edit_status").value = data.status;
                        editModal.show();
                    });
            }
        });
    </script>
</body>
</html>