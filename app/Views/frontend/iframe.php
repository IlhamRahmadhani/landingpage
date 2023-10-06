
<script type="text/javascript">
  function resizeIframe(iframe) {
    iframe.height = (iframe.contentWindow.document.body.scrollHeight + 100) + "px";
  }
</script>


<iframe width="100%" height="100%" 
style="overflow-x: hidden; overflow-y: hidden"
onload="resizeIframe(this)"
srcdoc='<!DOCTYPE html>
<html lang="en">
    <head>
        </head>
        <body>
            <?= html_entity_decode($html) ?>
        </body>
        </html>'>
    Your browser doesn't support iframes
</iframe>
