@push('extra_js')
    <script>
        $(document).ready(function() {
            setInterval(function() {
                var url = window.location.href;
                var oldCheckers = $('#checkersContainer').text().trim();
                $('<div>').load(url + ' #subContainer', function(response, status,
                    xhr) {
                    if (status == "success") {
                        var newCheckers = $(this).find('#checkersContainer').text().trim();
                        var currentContent = $('#mainContainer').text().trim();
                        var newTextContent = $(this).text().trim();
                        var newHtmlContent = $(this).html().trim();
                        if (oldCheckers !== newCheckers) {
                            $('#mainContainer').html(newHtmlContent);
                            runDataTable();
                            sendNotification('Notification', 'Page Content Updated');
                            $('#alertSound')[0].play();
                            console.log("Content updated.");
                        } else {
                            console.log("Content is the same, no update needed.");
                        }
                    } else if (status == "error") {
                        console.error("Error loading content: " + xhr.status + " " + xhr
                            .statusText);
                    }
                });
            }, 1000);
        });
    </script>
@endpush
