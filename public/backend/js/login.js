(function ($) {
  $(function () {
    $("[fLogin]").on("submit", function (e) {
      let $form = $(this);
      e.preventDefault();

      login($form).then((response) => {
        window.location.href = response.redirect;
      });
    });
  });
  function showToast(type, message) {
    return Swal.fire({
      icon: type,
      title: message,
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 1000,
    });
  }
  function login($form) {
    return new Promise((resolve, reject) => {
      let objAjax = {
        type: $form.attr("method"),
        data: new FormData($form[0]),
        url: $form.attr("action"),
        processData: false,
        contentType: false,
        success: function (response) {
          if (response.success !== undefined) {
            if (!response.success) {
              showToast("error", response.message);
            } else {
              showToast("success", response.message).then(() => {
                resolve(response);
              });
            }
          }
        },
        error: function (error) {
          reject(error);
        },
      };
      $.ajax(objAjax);
    });
  }
})(jQuery);
