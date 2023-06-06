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
async function showToast(type, message) {
  return await Swal.fire({
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
              options.onSubmit($modal, response, options);
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
  var inputs = document.querySelectorAll(".modal.show input");
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
  var ripples = document.querySelectorAll(".modal.show .btn");
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
          if (rippleDiv) {
            rippleDiv.parentElement.removeChild(rippleDiv);
          }
        }, 600);
      },
      false
    );
  }
  </script>
  `;
}
function modalCrud(type, url, title, addedOptions = {}) {
  let crudOptions;
  switch (type) {
    case "view":
      crudOptions = {};
      break;
    case "create":
      crudOptions = {
        submitButton: "Simpan",
        cancelButton: "Batal",
      };
      break;
    case "update":
      crudOptions = {
        submitButton: "Ubah",
      };
      break;
    case "delete":
      crudOptions = {
        submitButton: "Hapus",
      };
      break;
  }
  let options = {
    src: url,
    title: title,
    contentType: LOAD_CONTENT_TYPE.REPLACE,
    onSubmit: ($modal, response, finalOptions) => {
      if (response.success) {
        $modal.close();
        if ("container" in finalOptions && $(finalOptions.container).length) {
          ajaxLoadContent({
            container: addedOptions.container,
            src: $(addedOptions.container).data("url"),
            contentType: finalOptions.contentType,
          }).then(() => {});
        } else {
          window.location.reload();
        }
      }
    },
  };
  Object.assign(options, addedOptions);
  Object.assign(options, crudOptions);
  showModal(options, "#modal-crud");
}
$(document).ready(function () {
  lightbox.option({
    resizeDuration: 200,
    imageFadeDuration: 1,
    wrapAround: true,
  });
});
function isElementExist(selector) {
  let element = document.querySelector(selector);
  return typeof element !== undefined && element !== null;
}
function cleanSelector(selector) {
  return selector.replace(/#/g, "");
}
function initTinymce(selector, content = null, addedOptions = {}) {
  let _cleanSelector = cleanSelector(selector);
  if (tinymce.get(_cleanSelector)) {
    tinymce.get(_cleanSelector).destroy();
  }
  let options = {
    selector: selector,
    width: "100%",
    height: 300,
    promotion: false,
    content_css: "/frontend/assets/css/bootstrap.min.css, /frontend/style.css",
    content_style: "body {padding: 10px}",
    plugins: "advlist link lists table fullscreen code",
    menubar: "edit view insert format table",
    toolbar:
      "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist",

    init_instance_callback(editor) {
      if (content !== null) {
        editor.setContent(content);
        tinymce.triggerSave();
      }
    },
    setup: function (editor) {
      editor.on("change", function () {
        tinymce.triggerSave();
      });
    },
  };
  Object.assign(options, addedOptions);
  tinymce.init(options);
  document.addEventListener("focusin", (e) => {
    if (
      e.target.closest(
        ".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root"
      ) !== null
    ) {
      e.stopImmediatePropagation();
    }
  });
}
function encodeHTMLEntities(text) {
  var textArea = document.createElement("textarea");
  textArea.innerText = text;
  return textArea.innerHTML;
}
function decodeHTMLEntities(text) {
  var textArea = document.createElement("textarea");
  textArea.innerHTML = text;
  return textArea.value;
}
const LOAD_CONTENT_TYPE = {
  APPEND: "append",
  REPLACE: "replace",
};
function removeLoadingContent(container) {
  let $el = $(container);
  while ($el.length > 0) {
    if ($el.parent().find("#container-loading-content").length > 0) {
      $el.parent().find("#container-loading-content").remove();
      break;
    }
    $el = $el.parent();
  }
}
function showLoadingContent(container) {
  $(container)
    .parent()
    .closest("div")
    .append($("#template-loading-content").html());
}
function ajaxLoadContent(addedOptions) {
  return new Promise((resolve, reject) => {
    let options = {
      container: "",
      src: "",
      contentType: LOAD_CONTENT_TYPE.REPLACE,
    };
    Object.assign(options, addedOptions);
    $(options.container).data("url", options.src);
    showLoadingContent(options.container);
    $.ajax({
      type: "GET",
      url: options.src,
      dataType: "json",
      success: function (response) {
        let decoded = decodeHTMLEntities(response.html);
        switch (options.contentType) {
          case "replace":
            $(options.container).empty();
            $(options.container).hide();
            $(options.container).html(decoded);
            if ($(options.container).find("img").length > 0) {
              var loaded = 0;
              $(options.container)
                .find("img")
                .on("load", function () {
                  loaded++;
                  if (loaded == $(options.container).find("img").length) {
                    removeLoadingContent(options.container);
                    $(options.container).show();
                    resolve(response);
                  }
                });
            } else {
              removeLoadingContent(options.container);
              $(options.container).show();
              resolve(response);
            }
            break;
          case "append":
            removeLoadingContent(options.container);
            $(options.container).append(decoded);
            resolve(response);
            break;
        }
      },
      error: function (error) {
        reject(error);
      },
      always: function () {},
    });
  });
}
