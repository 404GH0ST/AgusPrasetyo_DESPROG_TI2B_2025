// const $ = window.jQuery

$(document).ready(() => {
  initializeEventListeners()
  initializeCharCounter()
})

function initializeEventListeners() {
  $("#postForm").on("submit", (event) => {
    if (!validateForm("postForm")) {
      event.preventDefault()
    }
  })

  $("#commentForm").on("submit", (event) => {
    if (!validateForm("commentForm")) {
      event.preventDefault()
    }
  })

  $(".modal-close, .modal-close-btn").on("click", () => {
    closeCommentModal()
  })

  $("#commentModal").on("click", (event) => {
    if ($(event.target).is("#commentModal")) {
      closeCommentModal()
    }
  })

  $("#judul, #nama, #email, #konten").on("blur", function () {
    validateField($(this))
  })

  $("#commentNama, #commentEmail, #commentKonten").on("blur", function () {
    validateField($(this))
  })

  $(document).on("keydown", (event) => {
    if (event.key === "Escape" && $("#commentModal").hasClass("show")) {
      closeCommentModal()
    }
  })
}

function initializeCharCounter() {
  const MAX_CHARS = 500

  $("#konten").on("input", function () {
    const currentLength = $(this).val().length
    const displayLength = Math.min(currentLength, MAX_CHARS)

    $(".char-count").text(displayLength + " / " + MAX_CHARS + " karakter")

    if (currentLength > MAX_CHARS) {
      $(this).val($(this).val().substring(0, MAX_CHARS))
      $(".char-count").text(MAX_CHARS + " / " + MAX_CHARS + " karakter")
    }
  })
}

function validateField($field) {
  const fieldName = $field.attr("name")
  const fieldValue = $field.val().trim()
  let isValid = true
  let errorMessage = ""

  switch (fieldName) {
    case "judul":
      if (fieldValue === "") {
        isValid = false
        errorMessage = "Judul postingan tidak boleh kosong"
      }
      break

    case "nama":
    case "commentNama":
      if (fieldValue === "") {
        isValid = false
        errorMessage = "Nama tidak boleh kosong"
      }
      break

    case "email":
    case "commentEmail":
      if (fieldValue === "") {
        isValid = false
        errorMessage = "Email tidak boleh kosong"
      } else if (!isValidEmailFormat(fieldValue)) {
        isValid = false
        errorMessage = "Format email tidak valid"
      }
      break

    case "konten":
      if (fieldValue === "") {
        isValid = false
        errorMessage = "Konten postingan tidak boleh kosong"
      } else if (fieldValue.length < 10) {
        isValid = false
        errorMessage = "Konten minimal 10 karakter"
      }
      break

    case "commentKonten":
      if (fieldValue === "") {
        isValid = false
        errorMessage = "Komentar tidak boleh kosong"
      }
      break
  }

  const errorElementId = "#error-" + fieldName
  if (isValid) {
    $field.removeClass("error")
    $(errorElementId).text("").fadeOut()
  } else {
    $field.addClass("error")
    $(errorElementId).text(errorMessage).fadeIn()
  }

  return isValid
}

function isValidEmailFormat(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return emailRegex.test(email)
}

function validateForm(formId) {
  let isFormValid = true
  let fieldsToValidate = []

  if (formId === "postForm") {
    fieldsToValidate = ["#judul", "#nama", "#email", "#konten"]
  } else if (formId === "commentForm") {
    fieldsToValidate = ["#commentNama", "#commentEmail", "#commentKonten"]
  }

  fieldsToValidate.forEach((fieldSelector) => {
    if (!validateField($(fieldSelector))) {
      isFormValid = false
    }
  })

  return isFormValid
}

function openCommentModal(postIndex) {
  $("#postIndex").val(postIndex)

  $("#commentForm")[0].reset()

  $(".error-message").text("")
  $(".form-input, .form-textarea").removeClass("error")

  $("#commentModal").fadeIn()
}

function closeCommentModal() {
  $("#commentModal").fadeOut()
}
