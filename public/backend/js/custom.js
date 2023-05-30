const MODAL_SIZE = {
  SMALL: "modal-sm",
  DEFAULT: "",
  LARGE: "modal-lg",
  XL: "modal-xl",
};
const TOAST_TYPE = {
  ERROR: "error",
  SUCCESS: "success",
};
const TOAST_TIMER = 1000;
function after(timeout, callback) {
  setTimeout(() => {
    callback();
  }, timeout);
}
function showToast(type, message) {
  return Swal.fire({
    icon: type,
    title: message,
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: TOAST_TIMER,
  });
}
function abortAjaxCrud() {
  if (window.xhrCrud != undefined) {
    $.each(window.xhrCrud, function (i, v) {
      v.abort();
    });
  }
}

function showModal(options = {}, element = "#modal-default") {
  let $modal = $(element);
  let $bSubmit = $modal.find("#button-submit");
  let $bClose = $modal.find("#button-close");
  let $title = $modal.find("#modal-title");
  let $dialog = $modal.find(".modal-dialog");
  let $body = $modal.find("#modal-body");
  let $alertMessage = $("#alert-message");

  $alertMessage.html("");

  // unbind all click events;
  $bClose.unbind("click");
  $bSubmit.unbind("click");
  $modal.close = () => {
    $bClose.click();
    abortAjaxCrud();
  };

  $bClose.on("click", function (e) {
    abortAjaxCrud();
  });

  // disable submit button while loading content
  $bSubmit.attr("disabled", true);

  $bSubmit.addClass("d-none");
  if (options.submitButton !== undefined && options.submitButton !== false) {
    $bSubmit.removeClass("d-none");
    $bSubmit.text(options.submitButton);
  }
  let bSubmitText = $bSubmit.text();

  if (options.title !== undefined) $title.text(options.title);

  $.each(Object.keys(MODAL_SIZE), function (i, v) {
    $dialog.removeClass(MODAL_SIZE[v]);
  });

  if (options.size !== undefined) {
    $dialog.addClass(options.size);
  }
  $body.html($("#loading-spin").html());
  $alertMessage.html("");
  $modal.modal("show");

  if (options.src !== undefined) {
    ajax(options.src, "GET", null).then((data) => {
      if (data.length > 0) {
        data += scriptInputEffect();
      }
      $body.html(data);
      $bSubmit.attr("disabled", false);

      $bSubmit.click(() => {
        let form = $body.find("form")[0];
        let formData = new FormData(form);
        let action = $(form).attr("action");
        let method = $(form).attr("method");
        $bSubmit.attr("disabled", true);
        $bSubmit.html($("#loading-button").html());
        ajax(action, method, formData)
          .then(
            function (response) {
              if (response.alert !== undefined) {
                $alertMessage.html(response.alert);
              }

              if (!response.success) {
                showToast(TOAST_TYPE.ERROR, response.message);
                if (response.content != []) {
                  $modal.find("#form-message").html(response.content);
                }
              } else {
                showToast(TOAST_TYPE.SUCCESS, response.message);
              }
              options.onSubmit($modal, response);
            },
            function (error) {}
          )
          .finally(function () {
            $bSubmit.attr("disabled", false);
            $bSubmit.text(bSubmitText);
          });
      });
    });
  }
}
function ajax(url, method, formData = null) {
  return new Promise((resolve, reject) => {
    let objAjax = {
      type: method,
      url: url,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.success !== undefined) {
          if (!response.success) {
            showToast(TOAST_TYPE.ERROR, response.message);
          } else {
            showToast(TOAST_TYPE.SUCCESS, response.message);
          }
        }
        resolve(response);
      },
      error: function (error) {
        reject(error);
      },
    };
    if (method == "POST") {
      objAjax.data = formData;
      objAjax.processData = false;
      objAjax.contentType = false;
    }

    if (window.xhrCrud === undefined) {
      window.xhrCrud = [];
    }
    window.xhrCrud.push($.ajax(objAjax));
  });
}
function scriptInputEffect() {
  return `<script>
  var inputs = document.querySelectorAll("input");
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener(
      "focus",
      function (e) {
        this.parentElement.classList.add("is-focused");
      },
      false
    );
    inputs[i].onkeyup = function (e) {
      if (this.value != "") {
        this.parentElement.classList.add("is-filled");
      } else {
        this.parentElement.classList.remove("is-filled");
      }
    };
    inputs[i].addEventListener(
      "focusout",
      function (e) {
        if (this.value != "") {
          this.parentElement.classList.add("is-filled");
        }
        this.parentElement.classList.remove("is-focused");
      },
      false
    );
  }
  // Ripple Effect
  var ripples = document.querySelectorAll(".btn");
  for (var i = 0; i < ripples.length; i++) {
    ripples[i].addEventListener(
      "click",
      function (e) {
        var targetEl = e.target;
        var rippleDiv = targetEl.querySelector(".ripple");
        rippleDiv = document.createElement("span");
        rippleDiv.classList.add("ripple");
        rippleDiv.style.width = rippleDiv.style.height =
          Math.max(targetEl.offsetWidth, targetEl.offsetHeight) + "px";
        targetEl.appendChild(rippleDiv);
        rippleDiv.style.left = e.offsetX - rippleDiv.offsetWidth / 2 + "px";
        rippleDiv.style.top = e.offsetY - rippleDiv.offsetHeight / 2 + "px";
        rippleDiv.classList.add("ripple");
        setTimeout(function () {
          rippleDiv.parentElement.removeChild(rippleDiv);
        }, 600);
      },
      false
    );
  }
  </script>
  `;
}
function modalCrud(type, url, title, addedOptions = {}) {
  let options = {};
  switch (type) {
    case "view":
      options = optionsView(url, title);
      break;
    case "create":
      options = optionsCreate(url, title);
      break;
    case "update":
      options = optionsUpdate(url, title);
      break;
    case "delete":
      options = optionsDelete(url, title);
      break;
    default:
      break;
  }
  Object.assign(options, addedOptions);
  showModal(options, "#modal-crud");
}
function optionsView(url, title) {
  return {
    src: url,
    title: title,
  };
}
function optionsCreate(url, title) {
  return {
    src: url,
    title: title,
    submitButton: "Simpan",
    cancelButton: "Batal",
    onSubmit: ($modal, response) => {
      if (response.success) {
        $modal.close();
        after(TOAST_TIMER, () => {
          window.location.reload();
        });
      }
    },
  };
}
function optionsUpdate(url, title) {
  return {
    src: url,
    title: title,
    submitButton: "Ubah",
    onSubmit: ($modal, response) => {
      if (response.success) {
        $modal.close();
        after(TOAST_TIMER, () => {
          window.location.reload();
        });
      }
    },
  };
}
function optionsDelete(url, title) {
  return {
    src: url,
    title: title,
    submitButton: "Hapus",
    onSubmit: ($modal, response) => {
      if (response.success) {
        $modal.close();
        after(TOAST_TIMER, () => {
          window.location.reload();
        });
      }
    },
  };
}
$(document).ready(function () {
  lightbox.option({
    resizeDuration: 200,
    imageFadeDuration: 1,
    wrapAround: true,
  });
});
