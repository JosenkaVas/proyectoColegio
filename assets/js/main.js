document.addEventListener("DOMContentLoaded", () => {

    // ====== LIKES ======
    document.querySelectorAll(".btn-like").forEach(btn => {
        btn.addEventListener("click", () => {

            const id = btn.dataset.id;

            fetch("../menu/like.php", {  // ruta corregida
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id_publicacion=" + id
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById("likes-" + id).innerText = data.likes;
            })
            .catch(err => console.error("ERROR LIKE:", err));
        });
    });

    // ====== COMENTARIOS ======
    document.querySelectorAll(".btn-comentar").forEach(btn => {
        btn.addEventListener("click", () => {

            const id = btn.dataset.id;
            const textarea = document.getElementById("comentario-" + id);
            const texto = textarea.value.trim();

            if (texto === "") {
                alert("Escribe un comentario");
                return;
            }

            fetch("../menu/comentario.php", {  // ruta corregida
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body:
                    "id_publicacion=" + id +
                    "&comentario=" + encodeURIComponent(texto)
            })
            .then(res => res.json())
            .then(data => {
                // Limpiar textarea
                textarea.value = "";

                // Mostrar comentario debajo
                const div = document.createElement("p");
                div.textContent = "💬 " + texto;
                textarea.parentElement.appendChild(div);
            })
            .catch(err => console.error("ERROR COMENTARIO:", err));
        });
    });

});
