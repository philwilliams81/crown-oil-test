@extends('base')

@section('content')
<body>
    <h1>User listing</h1>
    <div role="main" id="mainBlock">
        @foreach ($data['users'] as $user)
            <div data-user-id="{{ $user->id }}">
                User: <a href="mailto:{!! $user->email !!}">{!! $user->email !!}</a>
                Status: Active
            </div>
        @endforeach
    </div>

    <div class="modal" tabindex="-1" role="dialog" style="display: none;" id="confirm-user-delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm user deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please confirm you wish to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="confirm-user-delete-button" data-user-id>Delete
                        user</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection

@section('javascript')
<script type="text/javascript">
    var test = {{ $data['isTesting'] }};
    const isAdmin = {{ $data['isAdmin'] }};

    /**
     * Displays an alert
     *
     * @param {string} type The type of message
     * @param {string} message The message to be displayed
     */

    function showAlert(type, message) {
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type](message, "Notification");
    }


    $(document).ready(function() {

        /**
         * Bind events for our 'div' element containing the user data.
         */

        $("div[data-user-id]").on({
            'click': function(e) {

                // Test functionality
                if (test) {
                    console.log('no');
                    return;
                }

                // Admin check
                if (!isAdmin) {
                    showAlert('error', 'You dont have permission to do that')
                    return;
                } else {
                    // Assign userId to be the data attr value of the clicked element
                    var userId = $(this).attr('data-user-id');

                    // Prevent the opening of email clients on <a> links
                    e.preventDefault();

                    // Updatge the userId on the confirmation dialog button
                    $('#confirm-user-delete-button').attr('data-user-id', userId)

                    // Show our confirmation modal
                    $('#confirm-user-delete').modal('show');
                }
            }
        });

        /**
         * Bind events for our 'confirm-user-delete-button' element.
         */

        $('#confirm-user-delete-button').on({
            'click': function(e) {
                var userId = $(this).attr('data-user-id');

                $.get(`/users/${userId}/delete`)
                    .done(function(response) {
                        if (response.success) {
                            // Show our toast notifcation
                            showAlert('success', 'User removed');

                            // Remove the old user element
                            $('div[data-user-id="' + userId + '"]').remove();
                        } else {
                            // Show our failure message
                            showAlert('error', 'Failed deleting user');
                        }

                        // Hide our confirmation modal
                        $('#confirm-user-delete').modal('hide');

                    }).fail(function(e) {
                        // Show our AJAX call failure message
                        showAlert('error', e.responseJSON.error);
                    });
            }
        });
    });
</script>
@append

@section('styles')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<style type="text/css">
    :root {
        --userColour: red;
    }

    div[role="main"] {
        display: block;
        margin-left: 30px;
        background: var(--userColour);
        min-width: 200px
    }

    #mainBlock :first-child {
        margin-left: 0;
    }

</style>
@append
