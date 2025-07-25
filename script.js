document.getElementById("userForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  fetch("user_insert.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    document.getElementById("response").innerText = data;
    this.reset();
    loadTable();
  });
});

function toggleStatus(id) {
  fetch("toggle_status.php", {
    method: "POST",
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: "id=" + id
  })
  .then(res => res.json())
  .then(result => {
    if (result.success) {
      loadTable();
    } else {
      alert("Toggle failed");
    }
  });
}

function loadTable() {
  fetch("view.php")
    .then(res => res.text())
    .then(html => {
      document.getElementById("user-list").innerHTML = html;
    });
}

window.onload = loadTable;

