(function () {
  const message = document.querySelector(".alert");
  const author = document.querySelector("#author");
  const text = document.querySelector("#text");
  const addCommentBtn = document.querySelector("#btnComment");

  if (author && text) {
    author.addEventListener("keyup", (e) => {
      enableAddComment(e.target, text, addCommentBtn);
    });

    text.addEventListener("keyup", (e) => {
      enableAddComment(author, e.target, addCommentBtn);
    });
  }

  setTimeout(() => {
    if (message) {
      message.classList.add("d-none");
    }
  }, 2000);

  function enableAddComment(input, textarea, btn) {
    if (input.value != "" && textarea.value != "") {
      btn.removeAttribute("disabled");
    } else {
      btn.setAttribute("disabled", "disabled");
    }
  }
})();
